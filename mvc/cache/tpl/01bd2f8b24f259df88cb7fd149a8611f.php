<html>
	<head>
		<meta charset="utf-8" />
		<title><?=$title;?></title>
		<style>
			*{margin:0;padding:0;}
			div{width:800px;height:200px;background:pink;position:absolute;top:50%;left:50%;margin-left:-400px;margin-top:-100px;border-radius:5%;font-size:30px;font-weight:bold;line-height:100px;text-align:center;}
			div span{color:red;}
		</style>
		<script>
		window.onload = function()
		{
			var n = <?=$time;?>;
			var time = document.getElementById('time');
			
			setInterval(function(){
				n--;
				
				time.innerHTML = n+ '秒后跳转';
				
				if (n == 0) {
					window.location.href = '';
				}
			},1000);
			
		}
		</script>
	</head>
	<body>
		<div><span><?=$msg;?></span><a href="<?=$url;?>">返回</a>
			<h1 id="time"><?=$time;?>秒后跳转</h1>
		</div>
	</body>
</html>