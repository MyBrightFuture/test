<?php
namespace controller;
use controller\controller;
use model\usermodel;




class userController extends controller
{	

	public $user;
	protected $url;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new userModel();
		
	}

	//登录页面方法
	public function login()
	{
		$this->assign('title' , '登录');
		$this->display();
	}
	//注册方法
	public function register()
	{
		
		// var_dump($_SESSION);
		$this->assign('title','注册页面');
		// var_dump($GLOBALS['config']['WEB_SITE']);
		$this->assign('css',$GLOBALS['config']['WEB_SITE']);
		$this->display();

	}

	//找回密码页面
	public function findpass()
	{	
		$this->assign('type','email');
		$this->assign('username','请输入您的用户名');
		$this->assign('postadd','index.php?m=user&a=findback');
		$this->assign('title','请输入安全邮箱');
		$this->assign('placeholder','请输入安全邮箱');
		$this->display();
	}

	public function findback()
	{
		if(empty($_POST['username'])){
			$msg = '用户名不能为空';
			$this->error($msg,'index.php?m=user&a=findpass');
		}

		//判断邮箱是否存在
		$email = $_POST['email'];
		$username = $_POST['username'];
		$where = "email = '$email' && username = '$username'";
		$result = $this->user->find($where);
		

		if(!$result){
			$msg = '你输入的邮箱错误';
			$this->error($msg,'index.php?m=user&a=findpass');
		}else{
			require_once("./vendors/framework/lx/src/email/functions.php");
				$str = substr(str_shuffle('0123456789'),0,6);
					$_SESSION['str'] = $str;
				$_SESSION['tmpusername'] = $username;
				$_SESSION['email'] = $email;

				$flag = sendmail($email,'申请重置密码','您正在申请重置密码，验证码为'.$str.'，请勿泄露');

				if($flag){
					
					$this->assign('new',true);
					$this->assign('type','text');
					$this->assign('postadd','index.php?m=user&a=dofind');
					$this->assign('title','请输入您收到的验证码');
					$this->assign('placeholder','请输入验证码');
					$this->display('User/findpass.html');
				}else{
					$msg = '邮件发送失败,请稍后再试';
					$this->error($msg,'index.php?m=user&a=findpass');

				}
		}
	
	}

	//输入邮箱验证码后找回密码的方法
	public function dofind()
	{
		if(empty($_POST['email'])){
			$msg = '验证码输入错误';
			$this->error($msg,'index.php?m=user&a=findpass');
		}

		if($_POST['email'] == $_SESSION['str']){
			$newpass = substr(str_shuffle('0123456789qwertyuioplkjhgfdsazxcvbnm'),0,6);
			
			$data['password'] = md5($newpass);
			$username = $_SESSION['tmpusername'];
			$email = $_SESSION['email'];
			$where = "username = '$username'";
			$result = $this->user->doupdate($data,$where);
			var_dump($result);
			
			if($result[0] == 1){
				require_once("./vendors/framework/lx/src/email/functions.php");
				$flag = sendmail($email,'密码找回成功','您的新密码为'.$newpass.'，请及时修改密码');
				$msg = '新密码已经发到您的安全邮箱';
				$this->success($msg,'index.php?m=user&a=login');
			}else{
				$msg = '短信验证码输入错误';
				$this->error($msg,'index.php?m=user&a=findpass');
			}
			
		}else{

			
			$msg = '验证码输入错误';
			$this->error($msg,'index.php?m=user&a=findpass');
		}
	}
	
	//退出
	public function loginout()
	{
		unset($_SESSION['username']);
		$msg = '退出成功';
		$this->success($msg,$_SERVER['HTTP_REFERER']);
	}

	//检测上级来源页是否存在d的方法
	protected function checkorig()
	{
		if(empty($_SERVER['HTTP_REFERER'])){
		$this->error('禁止非法操作','index.php',2);
			
		}else{
			$this->url = $_SERVER['HTTP_REFERER'];

		}
	}

	//执行注册的方法
	public function doregister()
	{	
		//检测上级来源页是否存在
		$this->checkorig();
		
		//判断用户名长度是否合法
		if(empty($_POST['username'])){
			$this->error('用户名不能为空',$_SERVER['HTTP_REFERER'],2);

		}else{
			$username = $_POST['username'];
			$this->checkUsername($username);
		}

		//判断密码是否输入正确
		if(empty($_POST['password'])){
			$this->error('密码不能为空',$_SERVER['HTTP_REFERER'],2);

		}else{
			$password = $_POST['password'];
			$this->checkPassword($password);
		}

		//判断邮箱是否为空
		if(empty($_POST['email'])){
			$msg = '注册失败<br />邮箱不能为空';
			
			$this->error($msg,$this->url);

		}

		//判断用户名是否存在
		if($this->exists_username($username)){
			$msg = '注册失败<br />用户名已存在';
			
			$this->error($msg,$this->url);
		}

		//判断验证码是否输入正确
		/*if(!empty($_POST['yzm'])){
				if(strtolower($_SESSION['verify'] ) !== strtolower($_POST['yzm'])){
				$msg = '验证码输入不正确';
				$this->error($msg,$this->url);
			}
		}else{
			$msg = '验证码输入不正确';
				$this->error($msg,$this->url);
		}*/
		
		// //判断手机验证码是否输入正确
		// if(!empty($_POST['tel_yzm'])){
		// 		if($_POST['tel_yzm'] !== $_SESSION['checkmobile']){
		// 		$msg = '短信验证码输入错误';
		// 		$this->error($msg,$this->url);
		// 	}
		// }else{
		// 	$msg = '短信验证码输入错误';
		// 		$this->error($msg,$this->url);
		// }
		
		

		//准备用户注册的信息数据插入数据库

		$result = $this->doinsert();
		
		if($result){
			$msg = '恭喜您，注册成功<br />';

			$_SESSION['username'] = $username;

			$this->success($msg,'index.php');
		}else{
			$msg = '注册失败<br />用户名已存在';
			
			$this->error($msg,$this->url);
		}


	}

	//用户注册的信息数据插入数据库 方法
	protected function doinsert()
	{
		echo '1111';
		$data['username'] = $_POST['username'];
		$data['password'] =	md5($_POST['password']);
		$data['email'] = $_POST['email'];
		$data['ctime'] = time();
		$wen = '127.0.0.1';
		$data['rip'] = ip2long($wen);
		$data['tel'] = $_POST['tel'];
		$result = $this->user->doAdd($data);
		

		return $result;
	}
	//检测用户名是否存在的方法
	protected function exists_username($username)
	{
		$userinfo = $this->user->doFind($username);
		
		return $userinfo;
	}


	//检测密码是否合法的方法
	protected function checkpassword($password)
	{	
		//检查密码长度是否小于6位或者大于16位
		if(strlen($password)<6 || strlen($password) >16){

			$msg = '注册失败<br />密码长度错误：由6到14个字符组成';
			
			$this->error($msg,$this->url);
			}
	
		//检查两次密码是否输入一致
		if(empty($_POST['repassword'])){
			$msg = '注册失败<br />两次密码输入不一致';
			$this->error($msg,$this->url);

		}elseif(strcmp($password,$_POST['repassword'])){
			$msg = '注册失败<br />两次密码输入不一致';
			$this->error($msg,$this->url);
		}

		//判断密码是否为纯数字

		if(is_numeric($password)){
			$msg = '注册失败<br />密码不能为纯数字';
			$this->error($msg,$this->url);
		 }

	}

	//检测用户名的方法
	protected  function checkusername($username)
	{
		$pattern='/^[a-zA-Z\x{4e00}-\x{9fa5}]{2,12}$/u';

			if(!preg_match($pattern,$username)){
				$msg = '注册失败<br />用户名由2-16个中文或者英文组成';
				$url = $_SERVER['HTTP_REFERER'];
				$this->error($msg,$url,3);
			}
	}
	

	//执行登录的方法
	public function dologin()
	{	
		//检查上级来源页是否存在
		$this->checkorig();

		//判断用户名或密码是否为空
		if(empty($_POST['username']) || empty($_POST['password'])){
			$msg = '用户名或密码不能为空';
			$this->error($msg,$this->url);
		}

		//判断用户名与密码是否一致
		$this->isagree();
		
	}

	//判断密码是否与用户名一致的方法
	protected function isagree()
	{
		$userinfo = $this->exists_username($_POST['username']);

		if(!empty($userinfo)){

				if($userinfo[0]['password'] == md5($_POST['password'])){

					if($userinfo[0]['isban'] == 0){
							$msg = '登陆成功';
						$_SESSION['username'] = $_POST['username'];
						$this->success($msg,'index.php');
					}else{
						$msg = '登录失败<br />您的账户被禁止';
						$this->error($msg,$this->url);
					}

			
				}else{
					$msg = '登录失败<br />用户名或密码错误';
					$this->error($msg,$this->url);
				}
		}else{
			$msg = '登录失败<br />用户名不存在';
			$this->error($msg,$this->url);
		}
	}
	
}






