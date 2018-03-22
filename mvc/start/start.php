
<?php
class start
{
	static $loader;
	
	static public function run()
	{
		session_start();
		include 'start/psr4autoload.php';
		//我把数据库的配置文件拿过来
		$GLOBALS['config'] = include 'config/config.php';

		 // var_dump($GLOBALS['config']);die;
		self::$loader = new Psr4AutoLoad();
		
		self::$loader->register();
		
		
		
		
		$namespaces = include 'config/namespace.php';
		
		self::addnamespaces($namespaces);
		// var_dump($namespaces);
	}
	
	static public function addnamespaces($namespaces)
	{
		// var_dump($namespaces);
		
		foreach ($namespaces as $path => $namespace) {
			// echo $path.'---'.$namespace.'<br />';
			self::$loader->addnamesapce($namespace , $path);
		}
	}
	
	
	static public function route()
	{
		$_GET['m'] = isset($_GET['m']) ? $_GET['m'] : 'Index';
		$_GET['a'] = isset($_GET['a']) ? $_GET['a'] : 'index';
		$_GET['m'] = ucfirst($_GET['m']);


		// var_dump($_GET['m'],$_GET['a']);die;
		$controller = 'controller\\' . $_GET['m'] . 'controller';
		
		$controller = new $controller();
	

		//$controller->$_GET['a']();
		call_user_func(array($controller , $_GET['a']));
	}
}
