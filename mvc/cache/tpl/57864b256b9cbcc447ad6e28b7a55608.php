<div class="topbg">
    <ul class="topnav">
    <?php if(empty($_SESSION['username'])): ?>
     
     <a href="index.php?m=user&a=login">登录</a><a href="index.php?m=user&a=register">注册</a>
    <?php else : ?>
		欢迎：<?=$_SESSION['username'];?> 
		<?php if($userinfo[0]['udertype'] == 1): ?>
			<a href="index.php?m=admin&a=login">管理中心</a>
		<?php endif;?>
		<a href="index.php?m=user&a=loginout">退出</a>
    <?php endif;?>

   
    </ul>
    <div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src=""></iframe></div>
  </div>
  <div class="topbgline"></div>
  <div class="logo clear">
    <div class="picture">
      <a href="index.php?m=msg&a=photo"><img src="<?=$picture;?>" class="photo"/></a>
    </div>
	<div class="picture1">
	 <a href="#"><img src='public/images/haohao.png'/></a>
	</div>
  </div>
  <nav id="topnav">
    <ul>
      <a href="index.php" title="首页" class="nav_first">首页</a>
             
          
           
          
           <a class="nav_3"  href="index.php?m=article&a=detail"  title="技术分享">美文分享</a>
          
            <a class="nav_16"  href="index.php?m=article&a=addc"  title="发表博客">发表博客</a> 

              <a class="nav_16"  href="index.php?m=msg&a=index"  title="发表博客">我的资料</a> 


             

            <a class="nav_1"  href="index.php?m=article&a=message"  title="关于我">博客留言</a> 
          </ul>
          <form action="index.php?m=article&a=search" method ="post">
          <input type="text" name="content" class="search"/> 
          <input type="submit" value="搜索" class= "tt"/>
          </form> 

  </nav>