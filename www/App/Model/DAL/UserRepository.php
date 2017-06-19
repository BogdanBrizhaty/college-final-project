<?php

	require_once 'App/Model/Domain/User.php';
	require_once 'App/Model/DAL/IRepository.php';
	
	class UserRepository implements IRepository
	{
		// private $_Connection;
		// function __construct($Conection)
		// {
			// $this->_Connection = $Conection;
		// }
		public function GetById($id)
		{
			/*$Query = "Select * from `users` where `Id`='".$id."';";
			$QueryResult = mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			
			$user = new User($QueryResult['Id'],
							 $QueryResult['Email'],
							 $QueryResult['Password'],
							 $QueryResult['RegDate'],
							 $QueryResult['Name']
			);
			if (empty($QueryResult))
			{
				return false;
			}
			else return $user;*/
		}
		public function Get($LowerLimit, $UpperLimit, $param,$order )
		{/*
			$Query = "Select * from `users` ORDER BY `Id`;";
			$QueryResult = mysqli_query(Connection::GetInstance()->GetConnection(), $Query);
			$userArr = null;
			$userArr = array();
			while ($SingleResult = mysqli_fetch_assoc($QueryResult))
			{
				$userArr[] = new User($SingleResult['Id'], 
									  $SingleResult['Email'], 
									  $SingleResult['Password'], 
									  $SingleResult['RegDate'], 
									  $SingleResult['Name']);
			}
			return $newsArr;
*/
		}
		public function Update(IEntity $_object) 
		{/*
			$Query = "UPDATE `news` SET `Author` = '".$_object->Author."',
										`CreationDate` = '".$_object->CreationDate."',
										`Title` = '".$_object->Title."',
										`Preview` = '".$_object->Preview."',
										`Content` = '".$_object->Content."',
										`Views` = '".$_object->Views."' WHERE `news`.`Id` = ".$_object->Id;
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
			return false;		*/	
		}
		public function Delete($id)
		{/*
			$Query = "Delete from `news` where `news`.`Id`=".$id.";";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	*/
		}
		public function Add(IEntity $_object)
		{/*
			$Query = "INSERT INTO `users` (`Id`, 
										  `Email`, 
										  `Password`, 
										  `RegDate`, 
										  `Name`) 
										  VALUES (NULL, 
										  '".$_object->Email."', 
										  '".$_object->Password."', 
										  '".$_object->RegDate."', 
										  '".$_object->Name."');";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	*/
		}
		public function GetItemsCount()
		{ /*
			$Query = "Select count(`Id`) as `ItemsCount` from `news`;";
			$QueryResult =  mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			return $QueryResult['ItemsCount']; 
			return false;*/
		}
	}

?>
