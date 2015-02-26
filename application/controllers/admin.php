<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	/*
		Default route controller;
	*/
	private $_data = array();

	public function __construct(){
		parent::__construct();
		$login_status = $this->common->checkAdminLog();				
		if( !$login_status){
			$this->session->sess_destroy();
			redirect( site_url());
		}
	}

	public function welcome(){
		$this->common->loadView( 'admin' , 'welcome' , $this->_data);
	}

	public function ajax_file_upload(){
		$arr = array();
		$res = $this->common->uploadFile();		
		if( $res){
			$status = true;
			$arr['file_name'] = $res['file_name'];
		}else{
			$status = false;
			$arr['status'] = false;			
		}
		ajax_return( $status , json_encode( $arr));
	}

	public function delete_one_category(){
		if( $this->input->is_ajax_request()){
			$id = intval( $this->input->post( 'id'));
			$tablename = $this->input->post( 'type');			
			if( $this->common->getTotalRows( array( 'tablename' => $tablename , 'where' => array( 'catid' => $id))))
				ajax_return( false);
			else{
				$this->db->where( 'id' , $id);
				if( $this->db->delete( 'category'))
					ajax_return( true);
			}
		}
	}

	public function delete_one_msg(){
		if( $this->input->is_ajax_request()){
			$tablename = $this->input->post( 'tablename');
			$id = intval( $this->input->post( 'id'));
			$this->db->where( 'id' , $id);
			if( $this->db->delete( $tablename))
				ajax_return( true);
		}
	}

	public function change_pwd(){
		if( $this->input->is_ajax_request()){
			$old_pwd = $this->input->post( 'old_pwd');
			$userinfo = $this->session->userdata( 'userinfo');
			if( password( $old_pwd , $userinfo['encrypt']) == $userinfo['password']){
				$new_encrypt = get_random_string( 6);
				$new_pwd = $this->input->post( 'new_pwd');
				$update_arr['password'] = password( $new_pwd , $new_encrypt);
				$update_arr['encrypt'] = $new_encrypt;					
				$this->db->where( 'id' , $userinfo['id']);
				if( $this->db->update( 'user' , $update_arr)){
					$this->session->sess_destroy();
					ajax_return( true , '' , '' , site_url());
				}
			}else{
				ajax_return( false , '' , 'oldpwd');
			}
		}else{
			$this->common->loadView( 'admin' , 'change_pwd' , $this->_data);
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */