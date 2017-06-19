<?php
	
	require_once 'IEntity.php';
	class Category implements IEntity
	{
		public $Id;
		public $Name;
		
		function __construct($Id, $Name)
		{
			$this->Id = $Id;
			$this->Name = $Name;
		}
	}

?>