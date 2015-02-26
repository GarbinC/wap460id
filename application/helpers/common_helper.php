<?php
	/*
		公共函数库
	*/


	/*
		获取文章第一张图片作为封面图
	*/
	if( !function_exists( 'get_first_img')){
		function get_first_img( $content = ''){
			$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
			preg_match_all($pattern,$content,$matchContent);
			if(isset($matchContent[1][0]))
				return $matchContent[1][0];
			return false;
		}
	}


	/*
		获取随机字符串函数
		@length 获取字符串长度
		@chars salt
	*/
	if( !function_exists('get_random_string')){
		function get_random_string( $length , $chars = '1234567890abcdefghigklmnABCDEFGHIGKLMNOPQRSTUVWXYZ'){
			$random_str = '';
			$max_length = strlen( $chars) - 1;
			for( $i = 0; $i < $length; $i++){
				$random_str .= $chars[mt_rand( 0 , $max_length)];
			}
			return $random_str;
		}
	}

	/*
		ajax返回函数
		@status 返回状态
		@data 返回数据
		@message js弹出语句
		@url js跳转链接
	*/

	if( !function_exists('ajax_return')){
		function ajax_return( $status = true , $data = '' , $message = '' , $url = ''){
			$res = array();
			$res['status'] = (bool) $status;
			$res['data'] = $data;
			$res['msg'] = $message;
			$res['url'] = $url;
			echo json_encode( $res);
			exit();
		}
	}

	/*
		生成密码函数
	*/
	if( !function_exists('password')){
		function password( $password = '' , $encrypt = ''){
			if( $encrypt){
				return md5( md5( $password . $encrypt));
			}				
			else{
				$encrypt = get_random_string( 6);
				$res['encrypt'] = $encrypt;
				$res['password'] = md5( md5( $password . $encrypt));
				return $res;
			}
		}
	}

	/*
		打印函数
	*/

	if( !function_exists('dump')){
		function dump( $data , $if_exit = true){
			echo '<pre>';
			var_dump( $data);
			echo '</pre>';
			if( $if_exit)
				exit();
		}
	}


?>