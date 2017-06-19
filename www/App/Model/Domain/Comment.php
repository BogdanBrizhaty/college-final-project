<?php
	
	require_once 'IEntity.php';
	class Comment implements IEntity
	{
		public $Id;
		public $Name;
		public $Email;
		public $CreationDate;
		public $Content;
		
		function __construct($Id, $Name, $Email, $CreationDate, $Content);
		{
			$this->Id = $Id;
			$this->Name = $Name;
			$this->Email = $Email;
			$this->CreationDate = $CreationDate;
			$this->Content = $Content;
		}
	}

?>