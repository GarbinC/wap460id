<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Member extends CI_Controller{
        private $_data;
        function __construct(){
            parent::__construct();
        }
        
        public function mana(){
            $this->_data['user_msg'] = $this->common->getMsg( array(
                'tablename' => 'user',
                'orderby' => array( 'sort' => 'createtime' , 'order' => 'desc'),
                'where' => array( 'status' => 1)
            ));
            $this->common->loadView( 'admin' , 'user_mana' , $this->_data);
        }
        
        public function save(){
            if( $this->input->is_ajax_request()){
                
            }else{
                $uid = intval( $this->uri->segment(3));
                if( $uid)
                    $this->_data['user_msg'] = $this->common->getOneMsg( array());
                $this->common->loadView( 'admin' , 'user_save' , $this->_data);
            }
        }
    }
?>
