<?php
	
	require_once 'IEntity.php';
	class Article implements IEntity
	{
		public $Id;
		public $Author;
		public $CreationDate;
		public $Title;
		public $Preview;
		public $Content;
		public $Views;
		
		function __construct($Id, $Author, $CreationDate, $Title, $Preview, $Content, $Views)
		{
			$this->Id = $Id;
			$this->Author = $Author;
			$this->CreationDate = $CreationDate;
			$this->Title = $Title;
			$this->Preview = $Preview;
			$this->Content = $Content;
			$this->Views = $Views;
		}
	}

?>