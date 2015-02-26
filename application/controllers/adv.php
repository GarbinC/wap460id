<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Adv extends CI_Controller{
		private $_data;
		private $_tablename;

		function __construct(){
			parent::__construct();
			$this->_tablename = 'adv';
			$login_status = $this->common->checkAdminLog();				
			if( !$login_status){
				$this->session->sess_destroy();
				redirect( site_url());
			}
			$this->load->model( 'm_category' , 'category');
		}

		/*public function mana(){
			$this->_data['adv_msg'] = $this->common->getMsg( array( 'tablename' => 'category', 'orderby' => array( 'order' => 'desc' , 'sort' => 'id') , 'where' => array( 'type' => 1)));
			$this->common->loadView( 'admin' , 'adv_mana' , $this->_data);
		}*/

		public function mana(){
			$this->_data['adv_msg'] = $this->common->getMsg( array(
					'tablename' => 'adv',
					'orderby' => array( 'order' => 'desc' , 'sort' => 'sortrank')
				));
				$this->common->loadView( 'admin' , 'adv_mana' , $this->_data);
		
		}

		public function save_adv(){
			if( $this->input->is_ajax_request()){
				$id = intval( $this->input->post( 'advid'));
				$this->_data['title'] = $this->input->post( 'title');
				$this->_data['imageurl'] = $this->input->post('imageurl');
				$this->_data['sortrank'] = intval( $this->input->post('sortrank'));
				$this->_data['jumpurl'] = $this->input->post('jumpurl');
				$this->_data['catid'] = intval( $this->input->post( 'catid'));
				if( $id){
					$this->db->where( 'id' , $id);
					if( $this->db->update( $this->_tablename , $this->_data))
						ajax_return( true);
				}else{
					if( $this->db->insert( $this->_tablename , $this->_data))
						ajax_return( true);
				}

			}else{
				$id = intval( $this->uri->segment(3));
				if( $id)
					$this->_data['adv_msg'] = $this->common->getOneMsg( array( 'tablename' => $this->_tablename , 'where' => array( 'id' => $id)));
				$this->_data['category_msg'] = $this->common->getMsg( array( 'tablename' => 'category' , 'where' => array( 'type' =>1)));
				$this->common->loadView( 'admin' , 'adv_save' , $this->_data);
			}
		}

		public function save(){
			$this->common->loadView( 'admin' , 'adv_save_category' , $this->_data);
		}
	}
?>