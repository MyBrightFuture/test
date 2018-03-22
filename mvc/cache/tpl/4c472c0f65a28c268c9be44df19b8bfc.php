
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

	<link href='public/css/login_rand.css' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="public/css/login_min.css">
	<link rel="stylesheet" href="public/css/login_mate.css">
	<link rel="stylesheet" href="public/css/login_style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
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
            <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					

					<!-- Start Sign In Form -->
					<form action="index.php?m=user&a=dologin" method="post" class="fh5co-form animate-box" data-animate-effect="fadeIn">
						<h2>登录</h2>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<input type="text"  name="username" class="form-control" id="username" placeholder="用户名" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="密码" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="password" name="yzm" class="form-control" id="re-password" placeholder="请输入验证码" autocomplete="off">
						</div>
						<div class="form-group">
							<img  class="yzm" id ="img" src="vendors/framework/lx/src/verify.php" onclick="this.src='vendors/framework/lx/src/verify.php?'+Math.random();"/><br /><a href="index.php?m=user&a=login" id="btn">看不清换一张</a>
						</div>
						
						<div class="form-group">
							<label for="remember"><input type="checkbox" name="remember" id="remember">记住密码</label>
						</div>
						<div class="form-group">
							<p>没有注册？ <a href="index.php?m=user&a=register">注册</a> | <a href="index.php?m=user&a=findpass">忘记密码？</a></p>
						</div>
						<div class="form-group">
							<input type="submit" value="登录" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->

				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
				<div class="col-md-12 text-center"><p><small>&copy; All Rights Reserved. <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">拼搏，做更好的自己</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">坚持</a></small></p></div>
			</div>
		</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>


	</body>
</html>

