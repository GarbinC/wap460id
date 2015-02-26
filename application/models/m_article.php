<?php
	class M_article extends CI_Model{
		private $_data;
		private $_tablename;

		public function __construct(){
			parent::__construct();
			$this->_tablename = 'article';
		}

		public function getPagiMsg( $catid = 0){
			$res = array();
			/*分页*/
			$this->load->library( 'pagination');
			$cur_page = max( intval( $this->uri->segment(4)) , 1);
			$condition = array(
					'tablename' => $this->_tablename
				);
			if( $catid)
				$condition['where'] = array( 'catid' => $catid); 
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['use_page_numbers'] = true;
			$config['per_page'] = 10;
			$config['total_rows'] = $this->common->getTotalRows( $condition);
			$config['uri_segment'] = 4;
			$config['base_url'] = site_url( 'article/mana/'.$catid);
			$this->pagination->initialize( $config);
			$res['links'] = $this->pagination->create_links();
			
			/*数据*/
			$condition['limit'] = $config['per_page'];
			unset( $config);
			$condition['offset'] = ( $cur_page - 1) * $condition['limit'];
			$condition['orderby'] = array( 'sort' => 'sortrank' , 'order' => 'DESC');
			$res['msg'] = $this->common->getMsg( $condition);
			return $res;
		}
	}
?>