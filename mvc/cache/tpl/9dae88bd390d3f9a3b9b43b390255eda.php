<!doctype html>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>搜索</title>
<meta name="Keywords" content=" - 个人网站，叶子个人博客,叶子网站，叶子博客,个人原创网站，叶子" >
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
<meta name="Description" itemprop="description" content=" - 叶子个人博客，是一个伪文艺女码农个人网站，分享工作经验和生活,值得大家收藏的原创博客网站。" >
<meta itemprop="name" content=" - 叶子个人博客，是一个伪文艺女码农个人网站，分享工作经验和生活,值得大家收藏的原创博客网站。" />
<meta itemprop="image" content="https://static.yezismile.com" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://www.yezismile.com/favicon.ico" rel="shortcut icon"  />
<link href="public/css/base.css" rel="stylesheet" type="text/css"  />
<link href="public/css/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="public/css/jquery.classyleaves.min.css" />
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<NOSCRIPT><iframe src="*.html"></iframe></NOSCRIPT>
</head>
<body>
<header>
<?php include "cache/tpl/57864b256b9cbcc447ad6e28b7a55608.php";?>
</header>
<article>
  <div class="l_box f_l">
    <!-- banner -->
    <div class="topnews">
        <h2>
           <span>
              <a href="index.php" target="_blank">返回首页&gt;&gt;</a>
           </span>
           <b>搜索</b>结果        </h2>
           <?php if(!empty($searchInfo)): ?>
          <?php foreach($searchInfo as $val) :?>
                <div class="blogs">
        <figure>
            <a href="https://www.yezismile.com/detail/457.html" title="" target="_blank">
            <img src="public/images/201710091321426416_s.jpg" original="https://static.yezismile.com/data/photo/day_20171107/201711072145543410_s.jpeg" style="width:167.5px;height:137px;" alt="" >
            </a>
        </figure>
         <ul>
          <h3><a href="index.php?m=article&a=article&id=<?=$val['id'];?>" title="" target="_blank"><?=$val['title'];?></a></h3>
          <p>
        
              <a href="https://www.yezismile.com/detail/457.html" target="_blank" style="color: #759b08;padding-left:5px;">[详情]</a>
          </p>
          <p class="autor">
            <span class="lm f_l"><a href="" target="_self">韶华追忆</a></span>
            <span class="dtime f_l"></span>
            <input class="zan_cookie" type="hidden" value="2" />
			<input class="zan_newsid" type="hidden" value="457"/>
			<span class="label_bottom f_r" style="padding-left: 0;">
			    <a href="javascript:void(0)" onclick="return false;" class="yz_zan" style="">33</a>
			</span>
            <span class="viewnum f_r">浏览（<?=$val['hits'];?>）</span>
            <span class="pingl f_r">
            	<a  href="index.php?m=article&a=article" >
					<span id = "sourceId::457" class = "cy_cmt_count" >44</span>
				</a>
			</span>
          </p>
        </ul>
      </div>
        <?php endforeach;?> <?php endif;?> 
         <div class="pages" style="text-align:center;">
    &nbsp;
    <span>每页<?=$fenye['num'];?>条记录/共<?=$fenye['total'];?>条</span>
    &nbsp;
                  <a href="<?=$fenye['first'];?>">首页</a> <a href="<?=$fenye['prev'];?>">上一页</a> <a href="<?=$fenye['next'];?>">下一页</a> <a href="<?=$fenye['last'];?>">尾页</a> 当前是<?=$fenye['page'];?>页 共<?=$fenye['pageCount'];?>页 
                  <form action="index.php?m=article&a=detail" method="post">
                  <input type="text" name="page" value="<?=$fenye['page'];?>" size="2"/>
                  <input type="submit"  value="跳转" size="2"/>
                  </form>
      </div>

    </div>
  </div>
  <style type="text/css">
    .smile_news {
        overflow: hidden;
        width: 250px;
    }
    .smile_news h3 { font-size: 14px; background: url(public/images/r_title_bg.jpg) repeat-x center }
    .smile_news h3 p { background: #fff; width: 70px }
    .smile_news h3 span { color: #65b020 }
    .smile_rank li { height: 25px; line-height: 25px; clear: both; padding-left: 5px; overflow: hidden; padding-left: 15px; background: url(public/images/li.jpg) no-repeat left center; }
    .smile_rank { margin: 10px 0 }
    .smile_rank li a { color: #333; }
    .smile_rank li:first-child a {display: block;}
    .gzwm .feedback { background: url(public/images/feedback.jpg) no-repeat scroll 0% 0% transparent; }
    .gzwm .feedback:hover { color: #000; background: url(public/images/feedback_hover.jpg ) no-repeat scroll 0% 0% transparent; }

    .cwy_qq{margin:8px 13px 0 3px}
    .contact_us{padding:10px 16px 16px 16px;margin-top:15px;font-size:16px;border:1px solid #ededed}
    .contact_us a,.contact_us span{display:block;font-size:12px;height:32px;line-height:32px}
    .contact_us a i{background-image:url(public/images/yz_icon011-2.png);background-size:50px auto;-webkit-background-size:50px auto;}
    .contact_us a i{background-position:0 -460px}
    .contact_us a:hover{color:#759b08;text-decoration:underline}
    .contact_us span em{background-position: -178px -92px;width:22px;height:22px;display:inline-block;vertical-align:middle;margin-right:11px}
</style>
<!--right start-->
<?php include "cache/tpl/e8ba0827b25f31d48f6eed648d00206d.php";?>
        <!--
    <div class="tit01">
        <h3>联系我们</h3>
        <a href="mailto:tianzhukui@126.com"><i></i>tianzhukui@126.com</a>
        <span>
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=731090329&site=qq&menu=yes">
                <img class ="cwy_qq" border="0" src="picture/yz_qq.png"  />联系博主
            </a>
        </span>
    </div>
    -->
  </div>
  <!--r_box end -->
</article>
<script id="cy_cmt_num" src="public/js/plugins.list.count.js"></script>
<div class="blank"></div>
<div id="copright">
   <div id="tbox"> 
      <a id="gotop" href="javascript:void(0);" title="返回顶部"></a> 
  </div>
  <div>
      <p>Copyright © 2017
          <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000188223'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000188223%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
          <br/>
      www.yezismile.com All rights reserved. 京ICP备15029736号-1</p>
  </div>
</div>
</body>
</html>
<script type="text/javascript" src='public/js/diary_main.js'></script>
<script type="text/javascript" src='public/js/jquery.form.js'></script>
<script type="text/javascript" src="public/js/top.js"></script>
<script type="text/javascript" src="public/js/jquery.lazyload.js">></script>

<!--<script src="js/jquery.rotate.js"></script>
<script src="js/jquery.classyleaves.min.js"></script>-->

<!--<script src="js/d2bd52b27f50499280df645242e860ba.js"></script>-->

<script type="text/javascript">
    $(document).ready(function() {
           /* var tree = new ClassyLeaves({
                leaves: 30,
                maxY: -10,
                multiplyOnClick: true,
                multiply: 2,
                infinite: true,
                speed: 4000
            });
            $('body').on('click', '.addLeaf', function() {
                tree.add(8);
                return false;
            });*/

        $("img").lazyload({
            placeholder : "https://static.yezismile.com/sun/images/default_img.jpg",
            effect      : "show"//show(直接显示),fadeIn(淡入),slideDown(下拉)
        });
    });

    $(window).load(function(){
        $('.cy_cmt_count').prepend('评论（').append(' )');
    });

    
</script>
<!-- 叶子结束 -->
<script type="text/javascript">

    //后加载
    $(document).ready(function () {

    });





    var obj = null;
    var As=document.getElementById('topnav').getElementsByTagName('a');
    obj = As[0];
    for(i=1;i<As.length;i++){if(window.location.href.indexOf(As[i].href)>=0)
            obj=As[i];}
        obj.id='topnav_current'

</script>
