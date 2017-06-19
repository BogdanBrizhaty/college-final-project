<?php

	require_once 'App/Model/Domain/Photo.php';
	require_once 'IRepository.php';
	
	class PhotoRepository implements IRepository
	{
		public function GetById($id)
		{
			//
			return false;
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
			$Query = "Select * from `photos` ".$where." ORDER BY `Id` DESC ".$limit;
			$QueryResult = mysqli_query(Connection::GetInstance()->GetConnection(), $Query);
			$photos = array();
			while ($SingleResult = mysqli_fetch_assoc($QueryResult))
			{
				$photos[] = new Photo($SingleResult['Id'], 
									  $SingleResult['FileName'],
									  $SingleResult['Descr']);
			}
			return $photos;

		}
		public function Update(IEntity $_object) 
		{
			return false;
		}
		public function Delete($id)
		{
			$Query = "Delete from `photos` where `Id`=".$id.";";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
		public function Add(IEntity $_object)
		{
			$Query = "INSERT INTO `photos` (`Id`, 
										  `FileName`,
										  `Descr`) 
										  VALUES (NULL, 
										  '".$_object->FileName."',
										  '".$_object->Descr."');";
			if (mysqli_query(Connection::GetInstance()->GetConnection(), $Query)) { return true; }
			else return false;	
		}
	}

?>
