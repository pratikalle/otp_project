<?php
class Login_model extends CI_Model {

	public function check_mobile($mobile) {
		$this->db->where(array('phone' => $mobile));
		$query 	= $this->db->get('user_details');
		$result = $query->num_rows();
		return $result;
	}

	public function update_otp($mobile, $data) {
		return $this->db->update('user_details', $data, ["phone"=>$mobile]);
	}

	public function verify($mobile, $otp) {
		$this->db->where(array('phone' => $mobile, 'otp' => $otp));
		$query = $this->db->get('user_details');
		$result = $query->row();
        $data = array();
		if($result) {
			$data = [
				'login_id' 	=> $result->id,
				'login_name' 	=> $result->name,
				'login_mobile' 	=> $result->mobile,
				'login_status' 	=> TRUE,
			];
		}
		return $data;
	}
}


?>