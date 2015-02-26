<?php
	class D{
		private static $_instance;

		private function __construct(){

		}

		public function getInstance(){
			if( !( self::$_instance instanceof self))
				self::$_instance = new self;
			return self::$_instance;
		}

		static function getOneMsg( $param = array()){
			echo 'abc';exit();
		}
	}
?>