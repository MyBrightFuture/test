<div class="r_box f_r">
      
        <div class="tit01">
        <h3>我的关注</h3>
        <ul class="smile_rank" style="" >
                         <?php if(!empty($focus)): ?><?php foreach($focus as $val) :?>
                        <li>
                   <?=$val['focus'];?></li><?php endforeach;?><?php endif;?>
                    
                    </ul>
        <h3>我的收藏</h3>
        <ul class="smile_rank" style="" >
                         <?php if(!empty($collection)): ?><?php foreach($collection as $val) :?>
                        <li><a href="index.php?m=article&a=article&id=<?=$val['id'];?>"  title="  <?=$val['title'];?>">
                   <?=$val['title'];?></a></li><?php endforeach;?><?php endif;?>
                    
                    </ul>
        <h3>热门文章</h3>
        <ul class="smile_rank" style="" >
					<?php if(!empty($hotinfo)): ?>
                    <?php foreach($hotinfo as $val) :?>
                        <li><a href="index.php?m=article&a=article&id=<?=$val['id'];?>" target="_blank" title="php面试题总结（一）"><?=$val['title'];?></a></li>
                      <?php endforeach;?>
					  <?php endif;?>
                    </ul>
    </div>
        <div class="links">
       <h3>友情链接</h3>
       <ul>
                   <li><a href="https://39.106.45.13/index.php" target="_blank">王辽一博客</a></li>
                   <li><a href="http://39.106.45.13/index.php" target="_blank">老王</a></li>
                   <li><a href="http://39.106.45.13/index.php" target="_blank">王哥博客</a></li>
                   <li><a href="http://young.huyang520.top/" target="_blank">胡杨博客</a></li>
                   <li><a href="http://www.80le.net/" target="_blank">8090的年代</a></li>
                   <li><a href="http://www.zhangweisen.cn/" target="_blank">开心点博客</a></li>
                   <li><a href="http://www.leftso.com/" target="_blank">Leftso(左搜)</a></li>
                   <li><a href="http://lovefc.cn" target="_blank">封尘博客</a></li>
                 </ul>
    </div>