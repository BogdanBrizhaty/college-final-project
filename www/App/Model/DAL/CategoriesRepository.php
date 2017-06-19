<?php

	require_once 'App/Model/Domain/Category.php';
	require_once 'IRepository.php';
	
	class CategoriesRepository implements IRepository
	{
		public function GetById($id)
		{
			$Query = "Select * from `categories` where `Id`='".$id."';";
			$QueryResult = mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			
			$news = new Category($QueryResult['Id'],
							 $QueryResult['Name']);
			if (empty($QueryResult))
			{
				return false;
			}
			else return $news;
		}
		public function Get($LowerLimit, $UpperLimit, $param = '', $order = '')
		{
			if ($UpperLimit==0)
			{
				$limit = '';
			}
			else 
			{
				$limit = 'limit '.$LowerLimit.', '.$UpperLimit;
			}
			$where = '';
			if ($param!='')
			{
				$where = " where ".$param." ";
			}
			$orderby = ' order by Id desc';
			if ($order != '')
			{
				$orderby = ' order by '.$order.' desc ';
			}
			$Query = "Select * from `categories` ".$where.$orderby.$limit;

			$QueryResult = mysqli_query(Connection::GetInstance()->GetConnection(), $Query);
			$categoriesArr = array();
			while ($SingleResult = mysqli_fetch_assoc($QueryResult))
			{
				$categoriesArr[] = new Category($SingleResult['Id'], 
									  $SingleResult['Name']);
			}
			return $categoriesArr;

		}
		public function Update(IEntity $_object) 
		{
			$Query = "UPDATE `categories` SET 
										`Name` = '".$_object->Name."'
										WHERE `categories`.`Id` = ".$_object->Id;
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;				
		}
		public function Delete($id)
		{
			$Query = "Delete from `categories` where `categories`.`Id`=".$id.";";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
		public function Add(IEntity $_object)
		{
			$Query = "INSERT INTO `categories` (`Id`, 
										  `Name`) 
										  VALUES (NULL, 
										  '".$_object->Name."');";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
	}

?>
