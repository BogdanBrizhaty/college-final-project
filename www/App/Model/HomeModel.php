<?php

	require_once('DAL/NewsRepository.php');
	require_once('DAL/ArticlesRepository.php');
	require_once('DAL/SightsRepository.php');
		require_once('Domain/News.php');
		require_once('Domain/Article.php');
		require_once('Domain/Sight.php');

	class HomeModel extends BaseModel
	{
		private $articlesRepository;
		private $sightsRepository;
		function __construct()
		{
			$this->articlesRepository = new ArticlesRepository();
			$this->sightsRepository = new SightsRepository();
			parent::__construct(new NewsRepository(Connection::GerInstance()->GetConnection()));
		}
		
		function GetRecentNews()
		{
		/*	$Query = "Select * from `news` ORDER BY `CreationDate` DESC limit 0, 4";
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
			return $newsArr;*/
			// $repo = new NewsRepository();
			return $this->Repository->Get(0, 3, '', 'views');
		}
		function GetPopularArticles()
		{
			/*$Query = "Select * from `articles` ORDER BY `Views` DESC limit 0, 3";
			$QueryResult = mysqli_query(Connection::GetInstance()->GetConnection(), $Query);
			$articlesArr = null;
			$articlesArr = array();
			while ($SingleResult = mysqli_fetch_assoc($QueryResult))
			{
				$articlesArr[] = new Article($SingleResult['Id'], 
									  $SingleResult['Author'], 
									  $SingleResult['CreationDate'], 
									  $SingleResult['Title'], 
									  $SingleResult['Preview'], 
									  $SingleResult['Content'], 
									  $SingleResult['Views']);
			}
			
			return $articlesArr;*/
			
			return $this->articlesRepository->Get(0, 3, '', 'views');
		}
		function GetPopularSights()
		{
			/*$Query = "Select * from `sights` ORDER BY `Views` DESC limit 0, 3";
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
			return $sightsArr;*/
			return $this->sightsRepository->Get(0, 3, '', 'views');
			
		}
		
	}

?>
