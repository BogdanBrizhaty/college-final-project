<?php
	
	require_once 'IEntity.php';
	class User implements IEntity
	{
		public $Id;
		public $Login;
		public $Email;
		public $Password;
		public $Name;
		
		function __construct($Id, $Login, $Email, $Password, $Name)
		{
			$this->Id = $Id;
			$this->Login = $Login;
			$this->Email = $Email;
			$this->Password = $Password;
			$this->Name = $Name;
		}
	}

?>