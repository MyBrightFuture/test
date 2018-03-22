<?php
namespace framework;
//定义一个文件上传类
class upload
{
	//路径
	protected $path = './';

	//准许的mime类型 
	protected $allowMime = [
		'image/png','image/jpeg',
		'image/gif','image/wbmp'
	];

	//准许的文件后缀
	protected $allowSub = [
		'jpeg','png','jpg','gif','wbmp','bmp','pjpeg'
	];

	//文件准许的大小
	protected $allowSize = 2000000;
	//文件的错误号
	protected $errorNum;
	//文件的错误信息
	protected $errorInfo;
	//文件的大小
	protected $size;
	//文件的新名字
	protected $newName;
	//文件原名字
	protected $orgName;
	//是否启用随机文件名
	protected $isRandName;
	//临时文件名
	protected $tmpName;
	//文件前缀
	protected $preFix;
	//文件后缀
	protected $subFix;
	//文件的mime类型
	protected $type;

	public function __construct($array = [])
	{

		foreach($array as $key => $val){
			// // $keys = strtolower($key);
			// var_dump($key);
			// // var_dump(get_class_vars(get_class($this)));

			if(!in_array($key,array_keys(get_class_vars(get_class($this))))){

			

				// var_dump(array_keys(get_class_vars(get_class($this))));

				continue;
			}

			//通过setOptions函数去批量设置成员属性
			$this->setOptions($key,$val);

		}

		
	}

	//上传的方法
	public function up($fields)
	//input框提交的name值
	{

		if(!$this->checkPath()){
			exit('没有文件被上传');
		}

		//把传过来的图片的信息赋值给临时变量，
		$name = $_FILES['fields']['name'];

		$tmpName = $_FILES['fields']['tmp_name'];
		$type = $_FILES['fields']['type'];
		$error = $_FILES['fields']['error'];
		$size = $_FILES['fields']['size'];

		if($this->setFiles($name,$tmpName,$type,$error,$size)){
			//判断是否启用随机文件名
			$this->newName = $this->createName();

			//判断mime 大小  后缀
			if($this->checkMime() && $this->checkSize() && $this->checkSub()){
				//如果都成功了才让移动文件
				if($this->move()){
					// echo  11;
					return $this->newName;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}


	//移动文件
	protected function move()
	{
		if(is_uploaded_file($this->tmpName)){
			$this->path = rtrim($this->path,'/').'/'.$this->newName;

				if(move_uploaded_file($this->tmpName,$this->path)){
				return true;
			}else{
				$this->setOptions('errorNum',-7);
				return false;
			}
		}else{
			$this->setOptions('errorNum','-6');

			return false;
		}


	}
	//检查文件的大小
	protected function checkSize()
	{

		if($this->size < $this->allowSize){
			return true;
		}else{
			$this->setOptions('errorNum',-5);
			return false;
		}
	}
	//检查文件的后缀名
	protected function checkSub()
	{
		if(in_array($this->subFix,$this->allowSub)){
			return true;
		}else{
			$this->setOptions('errorNum',-4);
			return false;
		}
	}

	//检查文件的mime类型
	protected function checkMime()
	{
		if(in_array($this->type,$this->allowMime)){
			return true;
		}else{
			$this->setOptions('errorNum',-3);
			return false;
		}
	}
	//创建文件的新名字
	public function createName()
	{
		if($this->isRandName){
			return $this->preFix.$this->randName();
		}else{
			//不随机的区间
			return $this->preFix.$this->orgName;
		}
	}

	//随机文件名
	protected function randName()
	{
		return uniqid() . '.'.$this->subFix;
	}
	//给成员属性赋值
	protected function setFiles($name,$tmpName,$type,$error,$size)
	{
		$this->orgName = $name;
		$this->tmpName = $tmpName;
		$this->size = $size;
		$this->type = $type;

		//获取文件后缀名
		$arr = explode('.',$name);

		$this->subFix = array_pop($arr);

		return true;
	}
	

	//检测路径的方法
	public function checkPath()
	{

		if(empty($this->path)){
			
			$this->setOptions('errorNum' , -1);
			return false;
		}else{
			$this->path = rtrim($this->path , '/').'/';

			if(file_exists($this->path ) && is_writeable($this->path)){
				

				return true;
			}else{

				if(mkdir($this->path,0777,true)){
					return true;
				}else{
					$this->setOptions('errorNum',-2);
					return false;
				}
			}
		}
	}


	//给成员属性赋值的方法
	public function setOptions($keys,$val)
	{

		$this->$keys = $val;
		
	}

	//获取错误信息
	public function getErrorInfo()
	{
		$str = '';
		switch ($this->errorNum){
			case -1:
				$str = '没有上传文件';
				break;
			case -2:
				$str = '文件创建失败';
				break;
			case -3:
				$str = '不准许的mime类型';
				break;
			case -4:
				$str = '不准许的大小';
				break;
			case -6:
				$str = '不是上传文件';
				break;
			case -7:
				$str = '文件移动失败';
				break;
			case 1:
				$str = '上传的文件超过了php.ini中upload_max_filesize选项限制的值';
				break;
			case 2:
				$str = '上传的文件的大小超过了html表单中max_file_size选项指定的值';
				break;
			case 3:
				$str = '文件只有部分被上传';
				break;
			case 4:
				$str = '没有文件被上传';
				break;
			case 6:
				$str = '找不到临时文件夹';
				break;
			case 7:
				$str = '文件写入失败';
				break;

		}

		return $str;
	}
}