<?php
class psr4autoload
{
	public $namespaces = array();
	public function register()
	{
		spl_autoload_register(array($this , 'loadclass'));
	}
	
	
	public function loadclass($className)
	{
		//截取命名空间
		//截取真实的类名
		
		$pos = strrpos($className , '\\');
		
		$namespace = substr($className , 0 , $pos+1);
		
		$realClassName = substr($className , $pos+1);
		
		//像包含迈进一步
		$this->mapLoad($namespace , $realClassName);
	}
	
	//mapload 处理两种情况
	public function mapload($namespace , $realClassName)
	{
		//分两种情况
		//
		
		if (isset($this->namespaces[$namespace]) == false) {
			$path = $namespace . $realClassName . '.php';
			$path = str_replace('\\' , '/' , $path);
			$file = strtolower($path);
			
			$this->requireFile($file);
		} else {
			foreach ($this->namespaces[$namespace] as $path) {
				$file = strtolower($path .'/'. $realClassName . '.php');
				
				$this->requireFile($file);
			}
		}
	}
	
	//添加命名空间保存到一个数组里面去
	
	public function addnamesapce($namespace , $path)
	{
		$this->namespaces[$namespace][] = $path;
	}
	
	//执行包含
	
	public function requirefile($path)
	{
		
		if (file_exists($path)) {
			include $path;
			return true;
		} else {
			return false;
		}
		
	}
	
}	
	