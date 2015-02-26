<!-- <html>
	<head>
		<meta http-equiv='content-type' content='text/html;charset=utf-8' />
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH . 'jquery-2.0.2.min.js'?>"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH . 'jquery.validate.min.js'?>"></script>
	</head>

	<body>
		<form id='login_form'>
			账号：<input type='text' name="uname" /><br />
			密码：<input type="password" name="password" /><br />
			<input type='submit' value='提交' />
		</form>
	</body>
	
</html> -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>460id 手机站管理 登录</title>
<style type="text/css">
	div{overflow:hidden; *display:inline-block;}div{*display:block;}
	.login_box{background:url(http://www.460id.com/statics/images/admin_img/login_bg.jpg) no-repeat; width:602px; height:416px; overflow:hidden; position:absolute; left:50%; top:50%; margin-left:-301px; margin-top:-208px;}
	.login_iptbox{bottom:90px;_bottom:72px;color:#FFFFFF;font-size:12px;height:30px;left:50%;
margin-left:-280px;position:absolute;width:560px; overflow:visible;}
	.login_iptbox .ipt{height:24px; width:110px; margin-right:22px; color:#fff; background:url(http://www.460id.com/statics/images/admin_img/ipt_bg.jpg) repeat-x; *line-height:24px; border:none; color:#000; overflow:hidden;}
		.login_iptbox label{ *position:relative; *top:-6px;}
	.login_iptbox .ipt_reg{margin-left:12px;width:46px; margin-right:16px; background:url(http://www.460id.com/statics/images/admin_img/ipt_bg.jpg) repeat-x; *overflow:hidden;text-align:left;padding:2px 0 2px 5px;font-size:16px;font-weight:bold;}
	.login_tj_btn{ background:url(http://www.460id.com/statics/images/admin_img/login_dl_btn.jpg) no-repeat 0px 0px; width:52px; height:24px; margin-left:16px; border:none; cursor:pointer; padding:0px; float:right;}
	.yzm{position:absolute; background:url(http://www.460id.com/statics/images/admin_img/login_ts140x89.gif) no-repeat; width:140px; height:89px;right:56px;top:-96px; text-align:center; font-size:12px; display:none;}
	.yzm a:link,.yzm a:visited{color:#036;text-decoration:none;}
	.yzm a:hover{color:#C30;}
	.yzm img{cursor:pointer; margin:4px auto 7px; width:130px; height:50px; border:1px solid #fff;}
	.cr{font-size:12px;font-style:inherit;text-align:center;color:#ccc;width:100%; position:absolute; bottom:58px;}
	.cr a{color:#ccc;text-decoration:none;}
</style>
<meta http-equiv='content-type' content='text/html;charset=utf-8' />
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH . 'jquery-2.0.2.min.js'?>"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH . 'jquery.validate.min.js'?>"></script>
<script language="JavaScript">
<!--
	if(top!=self)
	if(self!=top) top.location=self.location;
//-->
</script>
</head>

<body onload="javascript:document.myform.uname.focus();">
<div id="login_bg" class="login_box">
	<div class="login_iptbox">
   	 <form id="login_form" action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post" name="myform">
   	 	<input name="dosubmit" value="" type="submit" class="login_tj_btn" />
   	 	<label>用户名：</label><input name="uname" type="text" class="ipt" value="" />
   	 	<label>密码：</label><input name="password" type="password" class="ipt" value="" />
   
     </form>
    </div>
    <div class="cr"> </div>
</div>
</body>
<script type="text/javascript">
		$('#login_form').validate({
			'rules':{
				'uname':{
					'required':true
				},
				'password':{
					'required':true
				}
			},
			'password':{
				'required':true
			},
			'messages':{
				'uname':{
					'required':'请填写用户名'	
				},
				'password':{
					'required':'请填写密码'
				}
			},
			'submitHandler':function(){
				var url = "<?php echo site_url('index/check_login_ajax');?>";
				var data = $('#login_form').serialize();
				$.ajax({
					url:url,
					data:data,
					type:'POST',
					dataType:'json',
					success:function( data){
						if( data.status){
							alert( data.msg);
							window.location.href = "<?php echo site_url( 'category/mana');?>";
						}else{
							alert( data.msg);
						}
					}
				});
			}
		});
	</script>
</html>