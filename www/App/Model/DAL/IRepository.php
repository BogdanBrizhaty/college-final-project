<?php

	require_once 'App/Model/Domain/IEntity.php';
	
	interface IRepository
	{
		// function __construct($Conection);
		public function Get($LowerLimit, $UpperLimit, $param, $order);
		public function GetById($id);
		public function Update(IEntity $_object);
		public function Delete($id);
		public function Add(IEntity $_object);
	}

?>
