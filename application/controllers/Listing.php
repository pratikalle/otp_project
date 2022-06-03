<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Listing extends CI_Controller 
{

    public function index()
    {
        //echo base_url();die();
        $this->load->view('user_list');
    }


    public function get_overall_user_datatable()
    {
        //ini_set('display_errors',1);
        $this->load->model('user_details_model');
	    $start = intval($_POST['start']);
		$draw = intval($_POST['draw']);
		$limit = intval($_POST['length']);
		$search_term = $_POST['search']['value'];
		$condition = array();
		
        
		$total_rows = count($this->user_details_model->get_where(
            false,
            false)
        );
        
        
		$user_data = $this->user_details_model->get_where(
            $limit,
            $start
        );
        //echo "<pre>";
       //print_r($user_data);die();
        
        
		$user=array();
		
		foreach($user_data as &$users)
		{
            $action = '<a href="'.base_url().'register/edit_user/'.$users['id'].'"><button class="btn btn-primary">Edit</button></a>';
		    //$img = '<img src="'.base_url().'profile_docs/'.$users['profile_picture'].'" width="100px" height="100px">';
            $user[]=array(
                $users['name'],
                $users['address'],
                $users['email'],
                $users['phone'],
                $action,
            );
		}
		echo json_encode(array("draw"=>$draw, "recordsTotal"=>$total_rows, "recordsFiltered"=>$total_rows, "data"=>$user));
    }




}



?>