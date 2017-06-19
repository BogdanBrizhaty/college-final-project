<?php
	
	class Message
	{
		public $Title;
		public $Message;
		
		function __construct($Title, $Message)
		{
			$this->Title = $Title;
			$this->Message = $Message;
		}
	}

?>