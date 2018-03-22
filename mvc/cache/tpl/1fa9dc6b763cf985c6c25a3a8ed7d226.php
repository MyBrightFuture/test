<!DOCTYPE html>
<head>
	<title>Contact Form Two</title>
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
			<h1 class="text-center margin-bottom-15">个性签名</h1>		
			<form class="form-horizontal templatemo-contact-form-2 templatemo-container" role="form" action="index.php?m=msg&a=autograph" method="post">
				<div class="row">
					<div class="col-md-6">
				        <div class="form-group">
				            <div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		<img class="form-control" style="height:200px;width:450px;margin-top:80px" id="message" src="public/images/3.jpg" />
				            	</div>
				          	</div>
				        </div>
					</div>
					<div class="col-md-6">
				        <div class="form-group">
				            <div class="col-sm-12">
				            	<div class="templatemo-input-icon-container">
				            		<a href="index.php?m=msg&a=index" style="margin-left:400px;">返回</a>
				            	</div>
				          	</div>
				        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
				          <div class="col-md-12">
				            <div class="templatemo-input-icon-container">
				            	<i class="fa fa-pencil-square-o"></i>
				            	<textarea rows="10" cols="50" class="form-control" id="message" name="autograph" placeholder="<?=$userinfo[0]['autograph'];?>"></textarea>
				            </div>
				          </div>
				        </div>
					</div>					
				</div>	        
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="submit" value="提交" class="btn btn-warning pull-right">		            
		          </div>
		        </div>		    	
		      </form>	 
              
		</div>
	</div>
</body>
</html>