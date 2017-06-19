<?php
	
	require_once 'IEntity.php';
	class Photo implements IEntity
	{
		public $Id;
		public $FileName;
		public $Descr;
		
		function __construct($Id, $FileName, $Descr)
		{
			$this->Id = $Id;
			$this->FileName = $FileName;
			$this->Descr = $Descr;
		}
	}

?>