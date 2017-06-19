<?php

	require_once('DAL/SightsRepository.php');
	require_once('DAL/CategoriesRepository.php');
		require_once('Domain/Category.php');

	class SightsModel extends BaseModel
	{
		function __construct()
		{
			parent::__construct(new SightsRepository());
		}
		
		function GetSights($ItemsPerPage, $CurrentPage, $category='')
		{
			if ($category!='')
			{
				return $this->Repository->Get(($CurrentPage-1)*$ItemsPerPage, $CurrentPage*$ItemsPerPage, " `Category` = '".$category."'");
			}
			else return $this->Repository->Get(($CurrentPage-1)*$ItemsPerPage, $CurrentPage*$ItemsPerPage);
			//var_dump($category);
		}
		function GetItemsCount($category = '')
		{
			if ($category!='')
			{
				return $this->Repository->GetItemsCountInCategory($category);
			}
			else return $this->Repository->GetItemsCount();
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
			$sight = $this->Repository->GetById($id);
			++$sight->Views;
			$this->Repository->Update($sight);
			// $sight = new Sight(0, $_SESSION['AuthenticatedUser']->Id, date("Y:m:d"), $Title, $Preview, $Text, 1);
		}
		function Edit($id, $post, $file)
		{
			$Title = htmlspecialchars(trim($post['Title']), ENT_QUOTES);
			$Preview = '';
			if ($file['name']!='') { $Preview = upl($file); }
			$Text = $post['Text'];
			$Category = $post['Category'];
			$views = $this->Repository->GetById($id)->Views;
			$sight = new Sight($id, '', '', $Category,  $Title, $Preview, $Text, $views);
			$this->Repository->Update($sight);
		}
		function GetCategories()
		{
			$repo = new CategoriesRepository();
			return $repo->Get(0,0);
		}
		function GetByCategory()
		{
			
		}
		function Add($post, $file)
		{
			$Title = htmlspecialchars(trim($post['Title']), ENT_QUOTES);
			$Preview = upl($file);
			$Text = $post['Text'];
			$Cat = $post['Category'];
			
			$sight = new Sight(0, $_SESSION['AuthenticatedUser']->Id, date("Y:m:d"), $Cat, $Title, $Preview, $Text, 1);
			
			$this->Repository->Add($sight);
		}
	}
?>
