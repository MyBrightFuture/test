<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>用户锁定</title>
<meta name="keywords" content="绿色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关Green绿色小清新的夏天的css3 html5 网站模板" />
<link href="public/css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="public/css/pintur.css">
<link rel="stylesheet" href="public/css/admin.css">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<style type="text/css">
	.mainContent .ulist .ting{
		width:86px;
		height:70px;
		float:right;
	}
	.mainContent .ulist .ting span{
		width:60px;
		height:30px;
		float:left;
		background:powderblue;
		border-radius:9%;
		margin-top:2px;
		line-height:30px;
		text-align:center;
	}
</style>
</head>
<body>

<div class="mainContent">
  <div class="ulist">
    <section> <a href="index.php?m=admin&a=user"> <img src="public/images/d3.jpg"></a>
      <ul>
        <h2><a href="index.php?m=admin&a=user">用户管理</a></h2>
        <p><a href="index.php?m=admin&a=user">用户锁定</a></p>
        <p><a href="index.php?m=admin&a=dark">用户解锁</a></p>
      </ul>
    </section>
    <section> <a href="index.php?m=admin&a=index"><img src="public/images/d2.jpg"></a>
      <ul>
        <h2><a href="index.php?m=admin&a=index">博客管理</a></h2>
        <p><a href="index.php?m=admin&a=index">博文管理</a></p>
        <p><a href="index.php?m=admin&a=bh">博文回收</a></p>
        <p><a href="index.php?m=admin&a=pg">评论管理</a></p>
        <p><a href="index.php?m=admin&a=ph">评论回收站</a></p>
      </ul>
    </section>
    <section> <a href="index.php?m=admin&a=lg"><img src="public/images/d1.jpg"></a>
      <ul>
        <h2><a href="index.php?m=admin&a=lg">留言管理</a></h2>
        <p><a href="index.php?m=admin&a=lg">留言管理</a></p>
        <p><a href="index.php?m=admin&a=lh">留言回收站</a></p>
      </ul>
    </section>
	<div class="ting clearFix">
		<span><a href="index.php">前台首页</a></span>
		<span><a href="index.php?m=admin&a=loginout">退出登录</a></span>
	</div>	
  </div>
</div>
<div class="mainContent2">

<form method="post" action="index.php?m=admin&a=recovery_reply" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 评论回收站</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
   
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th width="200">发布人</th>
        <th width="15%">标题</th>
        <th>内容</th>
      
       
        <th width="10%">发表时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
      <?php foreach($info as $val) :?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           <?=$val['id'];?></td>
          <td><?=$val['author'];?></td>
         <td><?=$val['title'];?></td>
          <td><?=$val['content'];?></td>
         
         
          <td><?php echo date('Y-m-d',$val['addtime']);?></td>
          <td><div class="button-group"> 
          
           <a href="index.php?m=admin&a=recovery_reply&id=<?=$val['id'];?>" class="button border-red">恢复</a>
        
          </div></td>
        </tr>
      <?php endforeach;?>
      
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="<?=$fenye['first'];?>">首页</a> <a href="<?=$fenye['prev'];?>">上一页</a> <a href="<?=$fenye['next'];?>">下一页</a><a href="<?=$fenye['last'];?>">尾页</a>  <span>每页<?=$fenye['num'];?>条记录/共<?=$fenye['total'];?>条，当前是<?=$fenye['page'];?>页 共<?=$fenye['pageCount'];?>页</span></div></td>
      </tr>
    </table>
  </div>
</form>

</div>
 
</body>
</html>











