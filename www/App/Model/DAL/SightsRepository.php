<?php

	require_once 'App/Model/Domain/Sight.php';
	require_once 'App/Model/DAL/IRepository.php';	
	
	class SightsRepository implements IRepository
	{
		public function GetById($id)
		{
			$Query = "Select * from `sights` where `Id`='".$id."';";
			$QueryResult = mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			
			$sights = new Sight($QueryResult['Id'],
							 $QueryResult['Author'],
							 $QueryResult['CreationDate'],
							 $QueryResult['Category'],
							 $QueryResult['Title'],
							 $QueryResult['Preview'],
							 $QueryResult['Content'],
							 $QueryResult['Views']
			);
			if (empty($QueryResult))
			{
				return false;
			}
			else return $sights;
		}
		public function Get($LowerLimit, $UpperLimit, $param = '', $order = '')
		{
			// var_dump($param);
			if ($UpperLimit==0)
			{
				$limit = '';
			}
			else 
			{
				$limit = ' limit '.$LowerLimit.', '.$UpperLimit;
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
			$Query = "Select * from `sights` ".$where.$orderby.$limit;
//var_dump($Query);
			$QueryResult = mysqli_query(Connection::GetInstance()->GetConnection(), $Query);
			$sightsArr = null;
			$sightsArr = array();
			while ($SingleResult = mysqli_fetch_assoc($QueryResult))
			{
				$sightsArr[] = new Sight($SingleResult['Id'], 
									  $SingleResult['Author'], 
									  $SingleResult['CreationDate'], 
									  $SingleResult['Category'], 
									  $SingleResult['Title'], 
									  $SingleResult['Preview'], 
									  $SingleResult['Content'], 
									  $SingleResult['Views']);
			}
			return $sightsArr;

		}
		public function Update(IEntity $_object) 
		{
			if ($_object->Views!=0)
			{
				$views = $_object->Views;
			}
			else
			{
				$views = 1;
			}
			
			$preview = '';
			if ($_object->Preview!='')
			{
				$preview = "`Preview` = '".$_object->Preview."',";
			}
			$category = '';
			// var_dump($_object->Category);
			if ($_object->Category!='')
			{
				$category = "`Category` = '".$_object->Category."',";
			}
			$Query = "UPDATE `sights` SET 
										".$category."
										`Title` = '".$_object->Title."',
										".$preview."
										`Content` = '".$_object->Content."',
										`Views` = '".$views."' WHERE `sights`.`Id` = ".$_object->Id;
			
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;				
		}
		public function Delete($id)
		{
			$Query = "Delete from `sights` where `sights`.`Id`=".$id.";";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
		public function Add(IEntity $_object)
		{
			$Query = "INSERT INTO `sights` (`Id`, 
										  `Author`, 
										  `CreationDate`, 
										  `Category`, 
										  `Title`, 
										  `Preview`, 
										  `Content`, 
										  `Views`) 
										  VALUES (NULL, 
										  '".$_object->Author."', 
										  '".$_object->CreationDate."',
										  '".$_object->Category."',
										  '".$_object->Title."', 
										  '".$_object->Preview."', 
										  '".$_object->Content."', 
										  '".$_object->Views."');";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
		public function GetItemsCount()
		{
			$Query = "Select count(`Id`) as `ItemsCount` from `sights`;";
			$QueryResult =  mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			return $QueryResult['ItemsCount'];
		}
		function GetItemsCountInCategory($category)
		{
			$Query = "Select count(`Id`) as `ItemsCount` from `sights` where Category = '".$category."'";
			$QueryResult =  mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			return $QueryResult['ItemsCount'];
		}
	}

?>
