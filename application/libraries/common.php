<?php
	class Common{
		private $CI;		
		function __construct(){
			$this->CI = &get_instance();
		}

		/*
			自定义loadView函数
		*/
		public function loadView( $type = '' , $template = '' , &$data){			
			switch ($type) {
				case 'admin':
					$this->CI->load->view( 'admin/header' , $data);
					$this->CI->load->view( "admin/{$template}");
					$this->CI->load->view( 'admin/footer');
					break;
				
				default:
					$this->load->view( $template , $data);
					break;
			}
		}

		/*
			验证后台管理登陆状态
		*/
		public function checkAdminLog(){			
			$userinfo = @$this->CI->session->userdata( 'userinfo');			
			if( empty( $userinfo))
				return false;
			$db_userinfo = $this->getOneMsg( array(
					'tablename' => 'user',
					'where' 	=> array( 'id' => $userinfo['id']),
					'select'	=> '*'
				));
			if( $db_userinfo['password'] == $userinfo['password'])
				return true;
			else
				return false;
		}

		/*
			验证用户登陆函数 
		*/

		public function checkLogin(){		
			$username = $this->CI->input->post( 'uname');
			$userinfo = $this->getOneMsg( array( 'tablename' => 'user' , 'where' => array( 'username' => $username)));	
			if( empty( $userinfo))
				return false;				
			$password = $this->CI->input->post( 'password');
			if( password( $password , $userinfo['encrypt']) == $userinfo['password']){
				return $userinfo;
			}
		}

		/*
			获取验证码函数
		*/
		public function get_captcha( $param = array()){
			$this->CI->load->helper( 'captcha');

		}

		public function uploadFile(){
			  $config['upload_path'] = FCPATH . '/statics/uploads/';
			  $config['allowed_types'] = 'gif|jpg|png|jpeg';
			  $config['max_size'] = 2000;
			  $config['encrypt_name'] = true;
			  $config['file_name'] = 'image';
			  $this->CI->load->library( 'upload' , $config);
			  $this->CI->upload->do_upload( $config['file_name']);
			  if( $errors = $this->CI->upload->display_errors()){
			  	dump( $errors);
			  	return false;
			  }else{
			  	return $this->CI->upload->data();
			  }

		}

		/*
			@tablename 表名称
			@where where条件数组
			获取表中的一条数据
		*/

		public function getOneMsg( $param = array()){
			$res = array();
			if( isset( $param['tablename']) && isset( $param['where']) && !empty( $param['where'])){
				foreach( $param['where'] as $k => $v){
					$this->CI->db->where( $k , $v);
				}
				$select = isset( $param['select'])?$param['select']:'*';
				$this->CI->db->select( $select);
				$query = $this->CI->db->get( $param['tablename']);
				if( $query->num_rows() === 1){
					$res = $query->row_array();
					$query->free_result();
				}
			}
			return $res;			
		}

		/*
			获取数据
		*/		
		public function getMsg( $param = array()){
			$res = array();
			if( isset( $param["where"])){
				foreach( $param['where'] as $k => $v){
					$this->CI->db->where( $k , $v);
				}
			}

			if( isset( $param['where_in'])){
				$this->CI->db->where_in( $param['where_in']['key'] , $param['where_in']['value']);
			}

			if( isset( $param['limit'])){
				$offset = isset( $param['offset'])?$param['offset']:0;
				$this->CI->db->limit( $param['limit']);
				$this->CI->db->offset( $offset);
			}

			if( isset( $param['orderby'])){
				$this->CI->db->order_by( $param['orderby']['sort'] , $param['orderby']['order']);
			}

			if( isset( $param['select']) && !empty( $param['select']))
				$this->CI->db->select( $param['select']);

			$query = $this->CI->db->get( $param['tablename']);
			if( $query->num_rows() > 0){
				$res = $query->result_array();
				$query->free_result();
			}
			return $res;
		}

		/*
			获取数据数量 分页用
		*/
		public function getTotalRows( $param = array()){
			if( isset( $param["where"])){
				foreach( $param['where'] as $k => $v){
					$this->CI->db->where( $k , $v);
				}
			}
			return $this->CI->db->count_all_results( $param['tablename']);
		}

	}
?>