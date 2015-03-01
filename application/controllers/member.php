<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Member extends CI_Controller{
        private $_data;
        function __construct(){
            parent::__construct();
            $login_status = $this->common->checkAdminLog();             
            if( !$login_status){
                $this->session->sess_destroy();
                redirect( site_url());
            }
            $this->_tablename = 'member';
            $this->load->model( 'm_member' , 'member' , true);
        }
        
        public function mana(){
            $this->_data['member_msg'] = $this->common->getMsg( array(
                'tablename' => 'user',
                'orderby' => array( 'sort' => 'createtime' , 'order' => 'desc'),
                'where' => array( 'status' => 1)
            ));
            $this->_data['member_msg'] = $this->member->getMemberMsg();
            $this->common->loadView( 'admin' , 'user_mana' , $this->_data);
        }

        public function jiedian_list(){
            $mid = intval( $this->uri->segment(3));
            if( !$mid)
                redirect( base_url());
            $this->_data['cur_mem'] = $this->common->getOneMsg( array(
                    'tablename' => 'member',
                    'where' => array( 'id' => $mid),
                    'select'=> 'tname'
                ));
            $condition['tablename'] = 'jiedian';
            $condition['where'] = array( 'mid'=> $mid);
            $condition['orderby'] = array( 'order' => 'desc' , 'sort' => 'createtime');
            $this->_data['jiedian_msg'] = $this->common->getMsg( $condition);
            $this->common->loadView( 'admin' , 'jiedian_list' , $this->_data);
        }

        public function show_jiedian(){
            $jid = intval( $this->input->post( 'jid'));
            
            if( $jid){
                $res = $this->common->getOneMsg( array(
                        'tablename' => 'jiedian',
                        'where' => array( 'id' => $jid)
                    ));
                echo $res['content'];
            }

            exit();
        }

        public function save_jiedian(){
            if( $this->input->is_ajax_request()){
                $mid = intval( $this->input->post( 'member_id'));
                $jid = intval( $this->input->post( 'jiedian_id'));
                $this->_data['title'] = $this->input->post( 'title');
                $this->_data['jname'] = $this->input->post( 'jname');
                $this->_data['content'] = $this->input->post( 'content');
                if( $jid){
                    $this->db->where( 'id' , $jid);
                    if( $this->db->update( 'jiedian' , $this->_data))
                        ajax_return( true);
                }else{
                    $this->_data['createtime'] = time();
                    $this->_data['mid'] = $mid;
                    if( $this->db->insert( 'jiedian' , $this->_data))
                        ajax_return( true);
                }
            }else{
                $member_id = intval( $this->uri->segment(3));
                $jiedian_id = intval( $this->uri->segment(4));                
                if( !$member_id)
                    redirect( base_url());
                $this->_data['member_id'] = $member_id;
                if( $jiedian_id){                    
                    $this->_data['jiedian_msg'] = $this->common->getOneMsg( array( 'tablename' => 'jiedian' , 'where' => array('id' => $jiedian_id)));
                    $this->_data['jname'] = $this->_data['jiedian_msg']['jname'];
                }                    
                $this->common->loadView( 'admin' , 'jiedian_save' , $this->_data);
            }
        }
        
        public function save(){
            if( $this->input->is_ajax_request()){
                $this->_data['username'] = $this->input->post( 'username');
                $this->_data['tname'] = $this->input->post( 'tname');
                $this->_data['mobile'] = $this->input->post( 'mobile');
                $this->_data['address'] = $this->input->post( 'address');
                $this->_data['email'] = $this->input->post( 'email');
                $this->_data['hetong'] = $this->input->post( 'hetong');
                $this->_data['qq'] = $this->input->post( 'qq');
                $this->_data['wechat'] = $this->input->post( 'wechat');
                $this->_data['remark'] = $this->input->post( 'remark');
                $this->_data['didian'] = $this->input->post( 'didian');
                $this->_data['jindu'] = $this->input->post( 'jindu');
                $member_id = intval( $this->input->post( 'member_id'));
                if( $member_id){
                    $password = $this->input->post( 'password');
                    if( !empty( $password))
                        $this->_data['password'] = md5( $password);
                    $this->db->where( 'id' , $member_id);
                    if( $this->db->update( $this->_tablename , $this->_data))
                        ajax_return(1);
                }else{
                    $this->_data['password'] = md5( $this->input->post( 'password'));
                    $this->_data['createtime'] = time();
                    if( $this->db->insert( $this->_tablename , $this->_data))
                        ajax_return( 1);
                }
            }else{
                $uid = intval( $this->uri->segment(3));
                if( $uid)
                    $this->_data['user_msg'] = $this->common->getOneMsg( array( 'tablename' => $this->_tablename , 'where' => array( 'id' => $uid)));
                $this->common->loadView( 'admin' , 'user_save' , $this->_data);
            }
        }

        public function search(){
            if( $this->input->is_ajax_request()){              
               $this->member->searchMember();
            }
        }
    }
?>
