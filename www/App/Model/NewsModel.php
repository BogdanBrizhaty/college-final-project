<?php

	require_once('DAL/NewsRepository.php');
		require_once('Domain/News.php');

	class NewsModel extends BaseModel
	{
		function __construct()
		{
			parent::__construct(new NewsRepository());
		}
		
		function GetNews($ItemsPerPage, $CurrentPage)
		{
			return $this->Repository->Get(($CurrentPage-1)*$ItemsPerPage, $CurrentPage*$ItemsPerPage);
		}
		function GetItemsCount()
		{
			return $this->Repository->GetItemsCount();
		}
		function ChangeName($el)
		{
			$Query = "Select * from users where Id = ".$el->Author;
			$result = mysqli_fetch_assoc(mysqli_query(Connection::GetInstance()->GetConnection(), $Query));
			$el->Author = $result['Name'];
			return $el;
		}
		function SetAuthorName($arr)
		{
			foreach($arr as $el)
			{
				$el = $this->ChangeName($el);
			}
			return $arr;
		}
		function GetForView($id)
		{
			$id = intval($id);
			return $this->Repository->GetById($id);
		}
		function Delete($id)
		{
			$id = intval($id);
			$this->Repository->Delete($id);
		}
		function UpdateViews($id)
		{
			$id = intval($id);
			$news = $this->Repository->GetById($id);
			++$news->Views;
			$this->Repository->Update($news);
			// $news = new News(0, $_SESSION['AuthenticatedUser']->Id, date("Y:m:d"), $Title, $Preview, $Text, 1);
		}
		function Edit($id, $post, $file)
		{
			$Title = htmlspecialchars(trim($post['Title']), ENT_QUOTES);
			$Preview = '';
			if ($file['name']!='') { $Preview = upl($file); }
			$Text = $post['Text'];
			$views = $this->Repository->GetById($id)->Views;
			$news = new News($id, '', '', $Title, $Preview, $Text, $views);
			$this->Repository->Update($news);
		}
		function Add($post, $file)
		{
			$Title = htmlspecialchars(trim($post['Title']), ENT_QUOTES);
			$Preview = upl($file);
			$Text = $post['Text'];
			
			$news = new News(0, $_SESSION['AuthenticatedUser']->Id, date("Y:m:d"), $Title, $Preview, $Text, 1);
			
			$this->Repository->Add($news);
		}
	}

?>
