<?php

	require_once('DAL/ArticlesRepository.php');
		require_once('Domain/Article.php');

	class ArticlesModel extends BaseModel
	{
		function __construct()
		{
			parent::__construct(new ArticlesRepository());
		}
		
		function GetArticles($ItemsPerPage, $CurrentPage)
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
			$article = $this->Repository->GetById($id);
			++$article->Views;
			$this->Repository->Update($article);
			// $article = new Article(0, $_SESSION['AuthenticatedUser']->Id, date("Y:m:d"), $Title, $Preview, $Text, 1);
		}
		function Edit($id, $post, $file)
		{
			$Title = htmlspecialchars(trim($post['Title']), ENT_QUOTES);
			$Preview = '';
			if ($file['name']!='') { $Preview = upl($file); }
			$Text = $post['Text'];
			$views = $this->Repository->GetById($id)->Views;
			$article = new Article($id, '', '', $Title, $Preview, $Text, $views);
			$this->Repository->Update($article);
		}
		function Add($post, $file)
		{
			$Title = htmlspecialchars(trim($post['Title']), ENT_QUOTES);
			$Preview = upl($file);
			$Text = $post['Text'];
			
			$article = new Article(0, $_SESSION['AuthenticatedUser']->Id, date("Y:m:d"), $Title, $Preview, $Text, 1);
			
			$this->Repository->Add($article);
		}
	}

?>
