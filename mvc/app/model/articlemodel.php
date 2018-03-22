<?php
namespace model;
use framework\model;

class articlemodel extends model
{
	public function doinsert($data)
	{
		$result = $this->table('article')->add($data);
		return $result;
	}
	
	//查询用户信息
	public function doselect($data)
	{
		$result = $this->table('user')->where("username = '$data'")->select($data);
		return $result;
	}
	
	//查询博客信息
	public function bloginfo($limit , $table , $where , $order)
	{
		$result = $this->fields()->table($table)->where($where)->limit($limit)->order($order)->select();
		return $result;
	}
	//查询当前博客详情
	public function parentpostinfo($where)
	{
		$result = $this->where($where)->select();
		return $result;
	}
	
	//查询作者
	public function getauthor($where)
	{
		$result = $this->where($where)->table('article')->select();
		return $result;
	}
	
	//求最大值方法
	public function dototal($where)
	{
		return $this->fields('id')->where($where)->total();
	}
	
	//查询方法
	public function inquiry($where , $table)
	{
		$result = $this->table($table)->limit()->where($where)->fields()->select();
		return $result;
	}
	
	//执行修改方法
	public function doupdate($data , $where , $table)
	{
		return $this->table($table)->where($where)->update($data);
	}
	
	public function thumbinfo($table , $where , $fields , $group)
	{
		$result = $this->table($table)->group($group)->where($where)->fields($fields)->select();
		return $result;
	}
	
	public function doadd($table , $data)
	{
		$result = $this->table($table)->add($data);
		return $result;
	}
}