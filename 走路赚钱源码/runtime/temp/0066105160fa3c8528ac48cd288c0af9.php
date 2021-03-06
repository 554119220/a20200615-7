<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/leetao.cn/public/../application/admincmsby/view/index/index.html";i:1557837528;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="广州是财富天下信息科技有限公司" />
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/style.css" />
<link rel="stylesheet" type="text/css" href="__CSS__/myalert.css" />
<style>
body{height:100%;background:#432f44;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
.admin_login dd .checkcode input{
	width:100%;
}
.admin_login dd .checkcode {
    width: 207px;
}
</style>

<script src="__ADMIN_JS__/jquery.js"></script>
<script type="text/javascript" src="__JS__/jquery.min.js"></script>
<script src="__ADMIN_JS__/Particleground.js"></script>
<script src="__JS__/myAlert.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#593c5b',
    lineColor: '#593c5b'
  });
  //测试提交，对接程序删除即可
	$('.submit_btn').click(function(event) {
	
		var username=$('input[name="username"]').val();
		var password=$('input[name="password"]').val();
		var code=$('input[name="code"]').val();
		console.log(username);
		if (username.length<3) {
			myAlert('请输入3位以上的账号');
			return;
		}
		if (password.length<6) {
			myAlert('请输入6位数以上的密码');
			return;
		}
		if (code.length<4) {
			myAlert('请输入4位验证码');
			return;
		}

		$.ajax({
			url:"<?php echo url('index/login'); ?>",
			dataType:"json",
			type:'POST',
			cache:false,
			data:{username:username,password:password,code:code},
			success: function(data) {
				console.log(data.s);
				if (data.s=='ok') {
					LoginAlert('登录成功',"<?php echo url('index/main'); ?>");
					//location.href="<?php echo url('index/main'); ?>";
				}else {
					$("#verify").attr('src','<?php echo captcha_src(); ?>?'+Math.random());
					myAlert(data.s);
				}
			}
		});
	});
	  
	$('#verify').click(function() {
		$(this).attr('src','<?php echo captcha_src(); ?>?'+Math.random());
	});	 
	
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
<form action="" method="post" id="content">
 <dd class="user_icon">
  <input type="text" placeholder="账号"  name="username" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" placeholder="密码" name="password" class="login_txtbx"/>
 </dd>
 <dd class="val_icon">
  <div class="checkcode">
    <input type="text" name="code" id="J_codetext" placeholder="验证码" maxlength="4" class="code login_txtbx">
    
	<canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
	
  </div>
  <img class="ver_btn"  src="<?php echo captcha_src(); ?>" alt="captcha" border="0" id="verify" width="84" height="38"/>
 <!--  <input type="button" value="验证码核验" class="ver_btn" onClick="validate();"> -->
 </dd>
 <dd>
  <input type="button" value="立即登录" class="submit_btn"/>
 </dd>
 </form> 
 <dd>
  <p>© 2016-2018 5G云资源网 版权所有</p>
  <p></p>
 </dd>
</dl>
</body>
</html>
