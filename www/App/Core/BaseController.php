<?php

class BaseController {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new BaseView();
	}
	
	// действие (action), вызываемое по умолчанию
	function ActionIndex()
	{
		// todo	w
	}
}
