<?php

	//implementing a singleton pattern
	class Connection 
	{
		private $_Connection;
		
		private static $_instance = null;
		
		private function __construct() 
		{
		}
		protected function __clone() 
		{
		}
		static public function GetInstance() 
		{
			if(is_null(self::$_instance))
			{
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		public function Connect()
		{
			$this->_Connection = mysqli_connect(HOST, USER, PASS, DB);
			if ($this->_Connection) { return true; } else return false;
		}
		public function GetConnection()
		{
			if ($this->_Connection!=null) { return $this->_Connection; } else return false;
		}
		
	}

?>
