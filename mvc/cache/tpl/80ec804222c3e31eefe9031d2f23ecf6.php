
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$title;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	

  

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='public/css/register_rand.css' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="public/css/register_main.css">
	<link rel="stylesheet" href="public/css/register_mate.css">
	<link rel="stylesheet" href="public/css/register_style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
		<script type="text/javascript" src="public/js/tel_jquery-1.11.1.min.js"></script>
		<script type="text/javascript"> 
			$(function(){
			 	$('#btn1').click(function(){
			 		var phone=$('#dx').val();
			 		data={
			 			'tel':phone
			 		}
			 		$.post('message.php',data,function(){
			 			
			 		})
			 	})
			 })

			 function refresh() 
			 { 
			  document.getElementById('img').src = "vendors/framework/lx/src/verify.php?"+Math.random(); 
			 } 
        </script> 
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					

					<!-- Start Sign In Form -->
					<form action="index.php?m=user&a=doRegister" method="post" class="fh5co-form animate-box" data-animate-effect="fadeIn">
						<h2>注册</h2>
						<div class="form-group">
							<div class="alert alert-success" role="alert">请填写以下信息完成注册</div>
						</div>
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="text" class="form-control" id="name" placeholder="用户名" name="username" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="安全邮箱" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Phone</label>
							<input type="text" name="tel" class="form-control" id="phone" placeholder="手机号码" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password"  name="password" class="form-control" id="password" placeholder="密码" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="password" name="repassword" class="form-control" id="re-password" placeholder="确认密码" autocomplete="off">
						</div>
						<!--<div class="verify">
							<img  class="yzm" id ="img" src="vendors/framework/lx/src/verify.php" onclick="this.src='vendors/framework/lx/src/verify.php?'+Math.random();"/><br /><a href="index.php?m=user&a=register" id="btn">看不清换一张</a>
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="password" name="yzm" class="form-control" id="re-password" placeholder="请输入验证码" autocomplete="off">
						</div>-->
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="text" name="tel_yzm" class="form-control" id="dx" placeholder="请输入手机验证码" autocomplete="off"/>
						</div>
						<div class="form-group">
							
							<a href='javascript:;'  class="telyz" id='getcode' onclick="getcode()">点击获取短信验证码</a>
						</div>
						<div class="form-group">
							<p>已经注册 ? <a href="index.php?m=user&a=login">登录</a></p>
						</div>

						<div class="form-group">
							<input type="submit" value="注册" class="btn btn-primary">
						</div>

						
					</form>
					<!-- END Sign In Form -->

				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
				<div class="col-md-12 text-center"><p><small>&copy; All Rights Reserved. <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">努力加强自己，守护要守护的人</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">坚持</a></small></p></div>
			</div>
		</div>
	
	<!-- jQuery -->
	<script src="public/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="blog/public/js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="public/js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="public/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="public/js/main.js"></script>
	<script>
		function getcode()
		{
			$('#getcode').text('60秒后重新获取');
			$('#getcode').removeAttr('onclick');
			var phone = $('#phone').val();
			//alert (phone);
			//写个定时修改文本settime
			var time = 59;
			var into = setInterval(function(){

				$('#getcode').text(time+'秒后重新获取');
				time =time -1;
				if(time<=-1){
					clearInterval(into);
					$('#getcode').text('获取验证码');
					$('#getcode').attr('onclick');
				}
			},1000);
			//ajax    参数1,url  index1.php   参数2, 数据   1234565432
			$.get('index1.php',{phone:phone},function(date){
				console.log(date);
			});
		}
	</script>
	</body>
</html>

