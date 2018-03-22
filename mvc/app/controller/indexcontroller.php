<?php
namespace controller;
use model\msgmodel;

class indexcontroller extends controller
{
	public function index()
	{
		$this->assign('title' , '博客首页');
		$this->display('Index/index.html');
	}
}