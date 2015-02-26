<?php
	class M_category extends CI_Model{
		private $_data;
		private $_tablename;

		public function __construct(){
			parent::__construct();
			$this->_tablename = 'category';

		}

		public function getIndexCategory(){
			$res = array();
			$sql = "select * from category where type = 0 and parentid = 0 order by sortrank desc limit 7";
			$query = $this->db->query( $sql);
			if( $query->num_rows() > 0){
				$res = $query->result_array();
				$query->free_result();
			}
			return $res;
		}

		private function article_count( $catid){
			$this->db->where( 'catid' , $catid);
			return $this->db->count_all_results( 'article');
		}

		public function getCateTreeTable(){
			$top_category = $this->common->getMsg( array( 'orderby' => array( 'sort' => 'sortrank' , 'order' => 'DESC') , 'tablename' => 'category' ,'where' => array( 'type' => 0, 'parentid' => 0)));
			$str = '';
			if( !empty( $top_category)){
				foreach( $top_category as $k => $v){
					$article_num = $this->article_count( $v['id']);
					$str .= "<tr><td>{$v['catname']}</td><td>{$article_num}</td><td>{$v['sortrank']}</td><td><a href='".site_url( 'category/save/edit/'.$v['id'])."'><span class='glyphicon glyphicon-pencil'></span></a>
 					&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"deleteOneMsg( 'category' , {$v['id']}); return false;\"><span class='glyphicon glyphicon-remove'></span></a>
					</td></tr>";
					$str = $this->getSubCatTable( $v['id'] , $str , '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
				}
			}			
			return $str;
		}

		private function getSubCatTable( $catid , $str , $step_str){
			$son_category = $this->common->getMsg( array( 'orderby' => array( 'sort' => 'sortrank' , 'order' => 'DESC') , 'tablename' => 'category' ,'where' => array( 'type' => 0, 'parentid' => $catid)));
			foreach( $son_category as $k => $v){
				$article_num = $this->article_count( $v['id']);
				$str .= "<tr><td>{$step_str}{$v['catname']}</td><td>{$article_num}</td><td>{$v['sortrank']}</td><td><a href='".site_url( 'category/save/edit/'.$v['id'])."'><span class='glyphicon glyphicon-pencil'></span></a>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"deleteOneMsg( 'category' , {$v['id']}); return false;\"><span class='glyphicon glyphicon-remove'></span></a></td></tr>";
				$str = $this->getSubCatTable( $v['id'] , $str , $step_str . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
			}
			return $str;
		}

		public function getCateTree(){
			$top_category = $this->common->getMsg( array('orderby' => array( 'sort' => 'sortrank' , 'order' => 'DESC') , 'tablename' => 'category' ,'where' => array( 'type' => 0, 'parentid' => 0)));
			$str = '';
			if( !empty( $top_category)){
				foreach( $top_category as $k => $v){
					$str .= "<option value={$v['id']}>{$v['catname']}</option>";
					$str = $this->getSubCat( $v['id'] , $str , '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
				}
			}			
			return $str;
		}

		private function getSubCat( $catid , $str , $step_str){
			$son_category = $this->common->getMsg(  array( 'orderby' => array( 'sort' => 'sortrank' , 'order' => 'DESC') , 'tablename' => 'category' ,'where' => array( 'type' => 0, 'parentid' => $catid)));
			foreach( $son_category as $k => $v){
				$str .= ( "<option value={$v['id']}>".$step_str."{$v['catname']}</option>");
				$str = $this->getSubCat( $v['id'] , $str , $step_str . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
			}
			return $str;
		}

	}
?>