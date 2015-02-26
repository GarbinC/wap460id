<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Content extends CI_Controller{
		private $_data;
		private $_tablename;

		function __construct(){
			parent::__construct();
			$this->load->model( 'm_article' , 'art');
			$this->load->model( 'm_category' , 'category');
		}

		public function show(){
			$id = intval( $this->uri->segment(3));
			if( !$id)
				redirect( base_url());
			$this->_data['content_msg'] = $this->common->getOneMsg( array(
					'tablename' => 'article',
					'where' => array( 'id' => $id)
				));
			$this->load->view( 'frontpage/header' , $this->_data);
			$this->load->view( 'frontpage/show');
			$this->load->view( 'frontpage/footer');
		}

		public function lists(){
			$catid = intval($this->uri->segment(3));
			if( !$catid){
				redirect( base_url());
			}
			$this->_data['cur_category'] = $this->common->getOneMsg( array(
					'tablename' => 'category',
					'where' => array( 'id' => $catid)
				));
			$this->_data['cur_catid'] = $catid;
			if( $this->_data['cur_category']['parentid'] == 0){
				//一级分类
				$this->_data['sub_category'] = $this->common->getMsg( array(
					'tablename' => 'category',
					'where' => array( 'parentid' => $catid),
					'orderby' => array( 'order' => 'desc' , 'sort' => 'sortrank')
				));

				$sub_category = $this->common->getMsg( array(
						'tablename' => 'category',
						'where' => array( 'parentid' => $catid),
						'select' => 'id'
					));
				$sub_cat[] = $catid;
				if( !empty( $sub_category)){
					foreach( $sub_category as $k => $v){
						$sub_cat[] = intval( $v['id']);
					}
				}

				$this->_data['art_msg'] = $this->common->getMsg( array(
					'tablename' => 'article',
					'where_in' => array( 'key' => 'catid' , 'value' => $sub_cat),
					'orderby' => array( 'order' => 'desc' , 'sort' => 'sortrank')
				));
				//dump( $this->db->last_query());

			}else{
				$this->_data['sub_category'] = $this->common->getMsg( array(
					'tablename' => 'category',
					'where' => array( 'parentid' => $this->_data['cur_category']['parentid']),
					'orderby' => array( 'order' => 'desc' , 'sort' => 'sortrank')
				));
				$this->_data['cur_catid'] = $this->_data['cur_category']['parentid'];
				$this->_data['art_msg'] = $this->common->getMsg( array(
					'tablename' => 'article',
					'where' => array( 'catid' => $catid),
					'orderby' => array( 'order' => 'desc' , 'sort' => 'sortrank')
				));
			}
			//dump( $this->_data['sub_category']);						
			
			$this->load->view( 'frontpage/header' , $this->_data);
			$this->load->view( 'frontpage/lists');
			$this->load->view( 'frontpage/footer');
		}

	}
?>