<?php

class Login extends CI_Controller {

public function __construct() {
	parent::__construct();
	$this->load->library('session');
	$this->load->model('login_model');
}

public function index() {
	$this->load->view('login');	
}

public function send_otp() {
	$mobile	= $this->input->post('mobile');
	
	$user = $this->login_model->check_mobile($mobile);

	if($mobile) {

		// Generate OTP
		$otp = $this->generate_otp();

		$data = [
			'otp'	=> $otp,
		];

		// update otp in database
		//$this->login_model->update_otp($mobile, $data);

		// send otp on mobile number
		$message = "Greetings! Your OTP is ".$otp.". Do not share with anyone.";

		$this->send_sms($mobile, $message);

		echo json_encode (array('status'=>400, 'msg'=>'OTP sent to your mobile number.'));

		$data['mobile'] = $mobile;
		$this->load->view('verify', $data);	

	} else {
		echo json_encode (array('status'=>400, 'msg'=>'OTP not sent'));
	}
}

public function send_sms($phone, $body) {

	// Your authentication key
	$authKey 	= 'auth_key';

	// Multiple mobiles numbers separated by comma					
	// Sender ID,While using route4 sender id should be 6 characters long.
	$senderId 	= 'CXSTEC';

	// Your message to send, Add URL encoding here.
	$message 	= urlencode($body);

	//Define route 
	$route 		= 'trans';

	//Prepare you post parameters
	$postData 	= array(
		'authkey' 	=> $authKey,
		'mobiles' 	=> $phone,
		'message' 	=> $message,
		'sender' 	=> $senderId,
		'route' 	=> $route
	);	

	//API URL
	$url 		= 'http://api.msg91.com/api/sendhttp.php';	

	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL 			=> $url,
		CURLOPT_RETURNTRANSFER		=> true,
		CURLOPT_POST 			=> true,
		CURLOPT_POSTFIELDS 		=> $postData
		));		

	//Ignore SSL certificate verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	//get response
	$output = curl_exec($ch);	
			
	curl_close($ch);
}

public function generate_otp() {
	$otp = rand(1000,9999);
	return $otp;
}

public function verify_otp() {
	$mobile	= $this->input->post('mobile');
	$otp = $this->input->post('otp');

	// check for otp 
	$user = $this->login_model->verify($mobile, $otp);
	if($user) {
		$this->session->set_userdata($user);
		redirect('user/dashboard');
	} else {
		echo "Invalid OTP or Mobile number.";
	}
}

}

?>