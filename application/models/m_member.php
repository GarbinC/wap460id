<?php
	class M_member extends CI_Model{
		private $_data;
		private $_tablename;

		function __construct(){
			parent::__construct();
			$this->_tablename = 'member';
		}

		public function searchMember(){

			$keyword = trim( $this->input->post( 'keyword'));
			$condition['tablename'] = $this->_tablename;
			$condition['where'] = array( 'status' => 1);
			$condition['like'] = array( 'username' , $keyword);
			$condition['or_like'] = array( 'tname' => $keyword );
			$res = $this->common->getMsg( $condition);
		//	echo $this->db->last_query();exit();
			echo $this->formatMemMsg( $res);
			exit();
		}

		private function formatMemMsg( $arr = array()){
			$str = '';		
			if( !empty( $arr)){			
				foreach ($arr as $key => $v) {
					 $inputtime = date( 'Y-m-d' , $v['createtime']);
                  $str .= "<tr><td>{$v['username']}</td><td>{$v['tname']}</td><td>{$v['mobile']}</td><td>{$v['email']}</td><td>{$v['hetong']}</td>
                  <td>{$inputtime}</td>
                  <td>
                    <a href='".site_url( 'member/save/'.$v['id'])."'><span class='glyphicon glyphicon-pencil'></span></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"deleteOneMsg( 'member' , {$v['id']}); return false;\"><span class='glyphicon glyphicon-remove'></span></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='".site_url( 'member/save_jiedian/'.$v['id'])."'><span class='glyphicon glyphicon-plus'></span></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='".site_url( 'member/jiedian_list/'.$v['id'])."'><span class='fa fa-bars'></span></a></td></tr>";
				}
			}
			return $str;
		}

		public function getMemberMsg(){
			$res = array();
			$this->load->library( 'pagination');
			$keyword = trim( $this->uri->segment(4));

			$condition = array( 'tablename' => $this->_tablename);

			if( !empty( $keyword)){
				$condition['like'] = array( 'username' , $keyword);
				$condition['or_like'] = array( 'tname' => $keyword , 'mobile' => $keyword);
			}

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
			$config['uri_segment'] = 3;
			$config['base_url'] = site_url( 'member/mana/');
			$this->pagination->initialize( $config);
			$res['links'] = $this->pagination->create_links();
			$condition['orderby'] =  array( 'sort' => 'createtime' , 'order' => 'desc');
			$condition['where'] = array( 'status' => 1);
			$condition['limit'] = $config['per_page'];
			$condition['offset'] = max( intval( $this->uri->segment( $config['uri_segment']) - 1) * $config['per_page'] , 0);
			$res['msg'] = $this->common->getMsg( $condition);
            return $res;
		}
	}

?>