<?php

	require_once 'App/Model/Domain/News.php';
	require_once 'App/Model/DAL/IRepository.php';	
	
	class NewsRepository implements IRepository
	{
		public function GetById($id)
		{
			$Query = "Select * from `news` where `Id`='".$id."';";
			$QueryResult = mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			
			$news = new News($QueryResult['Id'],
							 $QueryResult['Author'],
							 $QueryResult['CreationDate'],
							 $QueryResult['Title'],
							 $QueryResult['Preview'],
							 $QueryResult['Content'],
							 $QueryResult['Views']
			);
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
			$Query = "Select * from `news` ".$where.$orderby.$limit;

			$QueryResult = mysqli_query(Connection::GetInstance()->GetConnection(), $Query);
			$newsArr = null;
			$newsArr = array();
			while ($SingleResult = mysqli_fetch_assoc($QueryResult))
			{
				$newsArr[] = new News($SingleResult['Id'], 
									  $SingleResult['Author'], 
									  $SingleResult['CreationDate'], 
									  $SingleResult['Title'], 
									  $SingleResult['Preview'], 
									  $SingleResult['Content'], 
									  $SingleResult['Views']);
			}
			return $newsArr;

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
			$Query = "UPDATE `news` SET 
										`Title` = '".$_object->Title."',
										".$preview."
										`Content` = '".$_object->Content."',
										`Views` = '".$views."' WHERE `news`.`Id` = ".$_object->Id;
			
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;				
		}
		public function Delete($id)
		{
			$Query = "Delete from `news` where `news`.`Id`=".$id.";";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
		public function Add(IEntity $_object)
		{
			$Query = "INSERT INTO `news` (`Id`, 
										  `Author`, 
										  `CreationDate`, 
										  `Title`, `Preview`, 
										  `Content`, 
										  `Views`) 
										  VALUES (NULL, 
										  '".$_object->Author."', 
										  '".$_object->CreationDate."', 
										  '".$_object->Title."', 
										  '".$_object->Preview."', 
										  '".$_object->Content."', 
										  '".$_object->Views."');";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
		public function GetItemsCount()
		{
			$Query = "Select count(`Id`) as `ItemsCount` from `news`;";
			$QueryResult =  mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			return $QueryResult['ItemsCount'];
		}
	}

?>
