<!DOCTYPE html>
<head>
	<title>Login One</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="public/css/msg_font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="public/css/msg_min.css" rel="stylesheet" type="text/css">
	<link href="public/css/msg_bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="public/css/msg_templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">头像上传</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" style="height:600px" role="form" action="index.php?m=msg&a=doupload" method="post" enctype="multipart/form-data">				
		        <table cellspacing="0" cellpadding="0" class="tfm" style="margin-left:70px"
				<caption >
					<h2 class="xs2">当前我的头像</h2>
					<p>如果您还没有设置自己的头像，系统会显示为默认头像，您需要自己上传一张新照片来作为自己的个人头像 </p>
				</caption>
					<tr>
						<td>
						<img src="<?=$picture;?>" style="border:1px solid #ccc;height:200px;width:200px;margin-left:50px" />
						<br /><br /><br /><h2 class="xs2">设置我的新头像</h2><br />
						</td>
					</tr>
					<tr>
						<td>

						<input name="fields" type="file" style="height:23px; width:300px;text-align:center"  />
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="profilesubmitbtn" style="font-weight:bold;margin-left:120px;margin-top:20px;background:#f26c4f" id="profilesubmitbtn" value="保存" class="pn pnc" />
						</td>
					</tr>
				</table>
			</form>
			<div class="text-center">
				<a href="index.php?m=msg&a=index" class="templatemo-create-new">返回 <i class="fa fa-arrow-circle-o-right"></i></a>	
			</div>
		</div>
	</div>
</body>
</html>