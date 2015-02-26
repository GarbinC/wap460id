<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Article extends CI_Controller{
		private $_data;
		private $_tablename;

		function __construct(){
			parent::__construct();
			$this->_tablename = 'article';
			$login_status = $this->common->checkAdminLog();				
			if( !$login_status){
				$this->session->sess_destroy();
				redirect( site_url());
			}
			$this->load->model( 'm_article' , 'art');
			$this->load->model( 'm_category' , 'category');
		}

		public function mana(){
			$catid = intval( $this->uri->segment(3));
			$this->_data['category_tree'] = $this->category->getCateTree();
			$this->_data['art_msg'] = $this->art->getPagiMsg( $catid);
			$this->_data['catid'] = $catid;
			$this->common->loadView( 'admin' , 'article_mana' , $this->_data);
		}

		public function save(){
			if( $this->input->is_ajax_request()){
				$this->_data['title'] = $this->input->post( 'title');
				$this->_data['catid'] = intval( $this->input->post( 'catid'));
				$this->_data['description'] = $this->input->post( 'description');
				$this->_data['content'] = $this->input->post( 'content');
				$this->_data['sortrank'] = $this->input->post( 'sortrank');
				$artid = intval( $this->input->post( 'artid'));
				if( $artid){
					//编辑
					$this->db->where( 'id' , $artid);
					if( $this->db->update( $this->_tablename , $this->_data))
						ajax_return( true);
				}else{
					$this->_data['createtime'] = time();
					if( $this->db->insert( $this->_tablename , $this->_data))
						ajax_return( true);
				}
			}else{
				$artid = intval( $this->uri->segment(3));
				if( $artid){
					$this->_data['art_msg'] = $this->common->getOneMsg( array( 'tablename' => $this->_tablename , 'where' => array( 'id' => $artid)));
					$this->_data['catid'] = $this->_data['art_msg']['catid'];
				}					
				//dump( $this->_data);
				$this->_data['category_tree'] = $this->category->getCateTree();
				$this->common->loadView( 'admin' , 'article_save' , $this->_data);
			}
		}
	}
?>