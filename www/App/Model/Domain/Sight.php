<?php
	
	require_once 'IEntity.php';
	class Sight implements IEntity
	{
		public $Id;
		public $Author;
		public $CreationDate;
		public $Category;
		public $Title;
		public $Preview;
		public $Content;
		public $Views;
		
		function __construct($Id, $Author, $CreationDate, $Category, $Title, $Preview, $Content, $Views)
		{
			$this->Id = $Id;
			$this->Author = $Author;
			$this->CreationDate = $CreationDate;
			$this->Category = $Category;
			$this->Title = $Title;
			$this->Preview = $Preview;
			$this->Content = $Content;
			$this->Views = $Views;
		}
	}

?>