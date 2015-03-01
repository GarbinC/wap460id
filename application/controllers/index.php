<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model( 'm_category' , 'category');
	}

	public function index(){
		$this->_data['banner_msg'] = $this->common->getMsg( array( 'tablename' => 'adv' , 'orderby' =>array( 'order' => 'desc' , 'sort' =>'sortrank') ));
		$this->_data['category_msg'] = $this->category->getIndexCategory();
		/*$this->_data['enter460_msg'] = $this->common->getOneMsg( array(
				'tablename' => 'article',
				'where' => array( 'catid' => 31),
				'orderby' => array( 'order' => 'desc' , 'sort' => 'sortrank'),
				'limit' => 1
			));*/
		$this->_data['news_msg'] = $this->common->getMsg(array(
				'tablename'=>'article',
				'where' => array( 'catid' => 31),
				'orderby' =>array( 'order' => 'desc' , 'sort' =>"sortrank"),
				'limit' =>2
			));
		$this->_data['team_msg'] = $this->common->getMsg( array(
				'tablename'=>'article',
				'where' => array( 'catid' => 29),
				'orderby' =>array( 'order' => 'desc' , 'sort' =>"sortrank"),
				'limit' =>3
			));
		$this->_data['case_msg'] = $this->common->getMsg( array(
				'tablename'=>'article',
				'where' => array( 'catid' => 30),
				'orderby' =>array( 'order' => 'desc' , 'sort' =>"sortrank"),
				'limit' =>6
			));
		$this->load->view( 'frontpage/index' , $this->_data);
		$this->load->view( 'frontpage/footer');
	}

	public function admin_login(){
		$this->load->view('admin/login');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function check_login(){		
		$res = $this->common->checkLogin();
		if( $res){
			$this->session->set_userdata( 'userinfo' , $res);
			return true;
		}else{
			return false;
		}
	}

	public function check_login_ajax(){

		if( !$this->input->is_ajax_request())
			return false;	

		$res = $this->common->checkLogin();

		if( $res){
			$this->session->set_userdata( 'userinfo' , $res);
			//dump( $this->session->userdata('userinfo'));
			ajax_return( true , '' , '登陆成功' , site_url( 'admin/welcome'));
		}else{
			ajax_return( false , '' , '账号密码错误');
		}
	}
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */