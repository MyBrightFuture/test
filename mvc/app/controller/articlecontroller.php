<?php
namespace controller;
use controller\controller;
use model\articleModel;
use framework\page;

class articleController extends controller
{
	public $user;
	protected $url;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new articleModel();
		
	}
	//搜索结果
	public function search()
	{
		if(!empty($_POST['content'])){
			$content = $_POST['content'];
		} else {
			$content = null;
		}
		
		//查询符合搜索条件的内容
		$where = "first < 2 and title like '%$content%' or author like '%$content%' or content like '%$content%'";
		
		//结果总数
		$total = $this->user->dototal($where)[0]['c'];
		
		//分页
		$result = $this->page($total,2);
		
		//详细信息
		$limit = $result['offset'];
		$order = 'id';
		$table = 'article';
		$searchInfo = $this->user->bloginfo($limit , $table , $where , $order);
		

		
		$this->assign('searchInfo' , $searchInfo);
		$this->assign('fenye' , $result);
		
		$this->display();
		
	}
	//关注用户的方法
	public function focus()
	{
		//检查上级来源页
		$this->checkorig();
		
		//判断是否关注过
		$username = $_SESSION['username'];
		$focus = $_REQUEST['id'];
		$table = 'focus';
		$where = "username = '$username' && focus = '$focus'";
		$result = $this->user->inquiry($where , $table);
		
		if($result){
			$msg = '您已经关注过该用户了';
			$this->error($msg , $this->url);
		}else{
			$data['username'] = $username;
			$data['focus'] = $focus;
			
			$data['addtime'] = time();
			
			$result = $this->user->doadd($table , $data);
			
			if($result){
				$msg = '关注成功';
				$this->success($msg , $this->url);
			}else{
				$msg = '关注失败';
				$this->error($msg , $this->url);
			}
		}
	}
	
	//博客详情
	public function article()
	{
		//查询当前博客详情
		$postinfo = $this->parentpost();
		$where = 'id ='.$_REQUEST['id'];
		$data['hits'] = $postinfo[0]['hits']+1;
		
		//浏览量+1
		$this->user->doupdate($data , $where , $table = 'article');
		
		//查询当前博客的作者
		$author = $this->getAuthor();
		
		//查询总条数
		$id = $_REQUEST['id'];
		$total = $this->user->dototal($where = "first = 0 && replyid = $id")[0]['c'];
		
		$result = $this->page($total,1);
		
		$replyinfo = $this->user->bloginfo($limit = $result['offset'],$table = 'article', $where = 'first = 0 && replyid= '.$_REQUEST['id'].'',$order ='id');
		
		$this->assign('postinfo' , $postinfo);
		$this->assign('author' , $author);
		$this->assign('replyinfo' , $replyinfo);
		$this->assign('fenye' , $result);
		
		$this->display();
	}
	
	//博客主页
	public function detail()
	{
		//查询总条数
		$total = $this->user->dototal($where = 'first = 1 && isdel = 0')[0]['c'];
		
		//分页
		$result = $this->page($total , 3);
		
		//查询所有博客的信息
		$limit = $result['offset'];
		$table = 'article ';
		$where = "first = 1 && isdel = 0";
		$order = 'id';
		
		$bloginfo = $this->user->bloginfo($limit , $table , $where , $order);
		
		//查询所有博客的点赞信息
		$table2 = 'thumb';
		$fields2 = 'count(tid) as t,tid';
		$where2 = 'type = 0 ';
		$group = 'tid';
		$thumbinfo = $this->user->thumbinfo($table2 , $where2 , $fields2 , $group);
		
		//查询所有博客收藏信息
		$faviroteinfo = $this->user->thumbinfo($table2 , "type = 1" , $fields2 , $group);
		
		//查询所有博客评论信息
		$replyinfo = $this->user->thumbinfo('article' , "first = 0" , "count(id) as replycount , replyid" , "replyid");
		
		$this->assign('bloginfo' , $bloginfo);
		$this->assign('fenye' , $result);
		$this->assign('thumbinfo' , $thumbinfo);
		$this->assign('faviroteinfo' , $faviroteinfo);
		$this->assign('replyinfo' , $replyinfo);
		
		$this->display();
	}
	
	protected function page($total , $num)
	{
		$this->page = new Page($total , $num);
		
		//获取分页
		$result = $this->page->rander();
		
		return $result;
	}
	
	//发博页面
	public function addc()
	{
		$this->display();
	}
	
	//发表博客的方法
	public function doaddc()
	{
		//检测上级来源页是否存在
		$this->checkorig();
		
		//检查标题和内容是否为空
		if(empty($_POST['title']) || empty($_POST['content'])){
			$msg = '标题和内容不能为空';
			$this->error($msg , $this->url);
		}
		
		//插入数据库
		$result = $this->doinsert();
		//die;
		
		if($result){
			$msg = '发表成功';
			$this->success($msg , 'index.php?m=article&a=article&id='.$result[1].'');
		}else{
			$msg = '发表失败';
			$this->error($msg , $this->url);
		}
	}
	
	//执行插入博客的方法
	protected function doinsert()
	{
		$userinfo = $this->user->doselect($_SESSION['username']);
		
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['addtime'] = time();
		$wen = '127.0.0.1';
		$data['addip'] = ip2long($wen);
		$data['first'] = 1;
		$data['author'] = $userinfo[0]['username'];
		$result = $this->user->doinsert($data);
		//var_dump($result);
		return $result;
	}
	
	
	//查询当前帖子的作者
	protected function getauthor()
	{
		$id = $_REQUEST['id'];
		
		$result = $this->user->getauthor($where = "id = $id");
		
		return $result;
	}
	
	//查询当前帖子详情
	protected function parentpost()
	{
		$id = $_REQUEST['id'];
		
		$result = $this->user->parentpostinfo($where = "id = $id");
		return $result;
	}
	
	//检测上级来源页是否存在的方法
	protected function checkorig()
	{
		if(empty($_SERVER['HTTP_REFERER'])){
			$this->error('禁止非法操作' , 'index.php' , 2);
		}else{
			$this->url = $_SERVER['HTTP_REFERER'];
		}
		
		//检查是否登录
		if(empty($_SESSION['username'])){
			$msg = '请先登录';
			$this->error($msg , 'index.php?m=user&a=login');
		}
	}
	
	//留言的页面
	public function message()
	{
		$username = $_SESSION['username'];
		$where = "first = 2 && author = '$username'";
		
		//查询总条数
		$total = $this->user->dototal($where)[0]['c'];
		
		//分页
		$result = $this->page($total,3);
		
		$limit = $result['offset'];
		$table = 'article';
		
		$order = 'id';
		$messinfo = $this->user->bloginfo($limit , $table , $where , $order );
		
		$this->assign('fenye' , $result);
		$this->assign('messinfo' , $messinfo);
		$this->display();
		
	}
	
	//留言的方法
	public function domessage()
	{
		$this->checkorig();
		
		$username = $_SESSION['username'];
		//检查内容是否为空
		if (empty($_POST['content'])){
			$msg = '请输入留言内容';
			$this->error($msg , $this->url);
		}
		
		$data['content'] = $_POST['content'];
		$data['author'] = $this->userinfo[0]['username'];
		$data['first'] = 2;
		$data['addtime'] = time();
		$wen = '127.0.0.1';
		$data['addip'] = ip2long($wen);
		$data['replyid'] = $this->userinfo[0]['id'];
		
		$result = $this->user->doinsert($data);
		
		if($result[0]){
			$msg = '留言成功';
			$this->success($msg , 'index.php?m=article&a=message');
		}else{
			$msg = '留言失败';
			$this->error($msg , 'index.php?m=article&a=message');
		}
	}
	
	//评论的方法
	public function doreply()
	{
		//检测上级来源也是否存在
		$this->checkorig();
		
		//检查评论内容是否存在
		if(empty($_POST['content'])){
			$msg = '评论内容不能为空';
			$this->error($msg , $this->url);
		}
		
		//插入评论数据
		$result = $this->exec_reply();
		
		if($result){
			$msg = '评论成功';
			$this->success($msg , 'index.php?m=article&a=article&id='.$_POST['id'].'');
		}else{
			$msg = '评论失败';
			$this->error($msg , 'index.php?m=article&a=article&id='.$_POST['id'].'');
		}
	}
	
	//执行插入评论数据的方法
	protected function exec_reply()
	{
		$userinfo = $this->user->doselect($_SESSION['username']);
		
		$data['content'] = $_POST['content'];
		$data['addtime'] = time();
		$ip = $_SERVER['REMOTE_ADDR'];
		if ($ip = '::1'){
			$ip = '127.0.0.1';
		}
		$data['addip'] = ip2long($ip);  
		$data['author'] = $userinfo[0]['username'];
		$data['replyid'] = $_POST['id'];
		$data['first'] = 0;
		$result = $this->user->doinsert($data);

		
		return $result;
	}

}