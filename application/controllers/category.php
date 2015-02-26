<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	/*
		Default route controller;
	*/
	private $_data = array();
	private $_tablename = 'category';

	public function __construct(){
		parent::__construct();
		$login_status = $this->common->checkAdminLog();				
		if( !$login_status){
			$this->session->sess_destroy();
			redirect( site_url());
		}
		$this->load->model( 'm_category' , 'category');
	}

	public function mana(){
		$this->_data['category_str'] = $this->category->getCateTreeTable();
		$this->common->loadView( 'admin' , 'category_mana' ,$this->_data);
	}

	public function save(){
		if( $this->input->is_ajax_request()){
			$catid = intval( $this->input->post( 'catid'));
			$this->_data['catname'] = $this->input->post( 'catname');
			$this->_data['sortrank'] = intval( $this->input->post( 'sortrank'));
			$this->_data['parentid'] = intval( $this->input->post( 'parentid'));
			$this->_data['imageurl'] = $this->input->post( 'imageurl');
			$this->_data['type'] = $this->input->post( 'type')?intval( $this->input->post( 'type')):0;
			if( $catid){
				//编辑栏目
				$this->db->where( 'id' , $catid);
				if( $this->db->update( $this->_tablename , $this->_data))
					ajax_return( true);
			}else{
				//添加栏目				
				if( $this->db->insert( $this->_tablename , $this->_data))
					ajax_return( true);
			}
		}else{
			$type = $this->uri->segment(3);
			if( $type == 'add')
				$this->_data['parentid'] = intval( $this->uri->segment(3));
			else if( $type == 'edit'){
				$catid = intval( $this->uri->segment(4));
				$category_msg = $this->common->getOneMsg( array( 'tablename' => $this->_tablename , 'where' => array( 'id' => $catid)));
				$this->_data['parentid'] = $category_msg['parentid'];
				$this->_data['category_msg'] = $category_msg;				
			}					
			$this->_data['category_tree'] = $this->category->getCateTree();
			$this->common->loadView( 'admin' , 'category_save' , $this->_data);
		}

	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */