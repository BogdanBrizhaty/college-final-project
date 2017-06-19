<?php
	
	 require_once 'Domain/User.php';
	
	class AuthProvider
	{		
		private static $_instance = null;
		
		private function __construct() 
		{
			if (!isset($_SESSION['AuthenticatedUser'])) $_SESSION['AuthenticatedUser'] = null;
		}
		protected function __clone() { }
		static public function GetInstance() 
		{
			if(is_null(self::$_instance))
			{
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		public function CookieAuth()
		{
			if (isset($_COOKIE['user']) && $_COOKIE['user'])
			{
				if (!isset($_SESSION['AuthenticatedUser']))
				{
					$Query = "Select * from `users` where `Password`= '".$_COOKIE['user']."';";
					$Result = mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
					if ($Result) 
					{
						$_SESSION['AuthenticatedUser'] = new User($Result['Id'],
																$Result['Login'],
																$Result['Email'],
																$Result['Password'],
																$Result['Name']
						);
					}	
				}
			}
		}
		public function Authenteficate($email, $password)
		{
			//обработка
			$Query = "Select * from `users` where `Login`= '".$email."' and `Password`='".$password."';";
			$Result = mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			if ($Result) 
			{
				$_SESSION['AuthenticatedUser'] = new User($Result['Id'],
													$Result['Login'],
													$Result['Email'],
													$Result['Password'],
													$Result['Name']
				);
			}
			setcookie('user', $_SESSION['AuthenticatedUser']->Password, strtotime('30 days'),'/');
		}
		public function Logout()
		{
			$_SESSION['AuthenticatedUser'] = null;
			session_unset();
			setcookie('user','',strtotime('-1 days'),'/');
		}
		public function StartSession()
		{
			// session_start();
			$_SESSION['AuthenticatedUser'] = null;
		}
		public function IsAuthenticated()
		{
			if (isset($_SESSION['AuthenticatedUser']))
			{
				if ($_SESSION['AuthenticatedUser']!=null)
				{
					return true;
				}
				else return false;
			}
			else return false;
		}
	}

?>