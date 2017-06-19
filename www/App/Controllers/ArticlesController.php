<?php 

	class ArticlesController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			$this->model = new ArticlesModel();
		}
		public function ActionIndex()
		{
			$TotalItems = $this->model->GetItemsCount();
			$ItemsPerPage = 5;
			$TotalPages = ceil($TotalItems / $ItemsPerPage);
			// var_dump($TotalPages);
			$CurrentPage = 1;
			
			if (isset($_GET['page']))
			{
				$CurrentPage = intval($_GET['page']);
				if ($CurrentPage==null or $CurrentPage<1 or $CurrentPage>$TotalPages) 
				{
					$CurrentPage = 1;
				}
			}

			$data['title'] = "Статьи";
			$data['CurrentPage'] = $CurrentPage;
			$data['TotalPages'] = $TotalPages;
			$data['articles'] = $this->model->SetAuthorName($this->model->GetArticles($ItemsPerPage, $CurrentPage));
			$this->view->generate('Articles.php', 'GeneralLayout.php', $data);
		}
		
		function ActionEdit()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
				if (isset($_POST['Title']))
				{
					$this->model->Edit($_GET['id'], $_POST, $_FILES['Photo']);
					$this->ActionIndex();
				}
				else
				{
					if (isset($_GET['id']))
					{
						$data['a'] = $this->model->GetForView($_GET['id']);
						$data['title'] = "Редактирование статьи";
						$this->view->generate('ArticlesEdit.php', 'GeneralLayout.php', $data);
					}
					else
					{
						$this->ActionIndex();
					}
				}
			}
			else
			{
				$_SESSION['msg'] = new Message('Error!','You dont have permission to visit this page.');
				Route::Home();
			}
		}
		
		function ActionDelete()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
				if (isset($_GET['id']))
				{
					$this->model->Delete($_GET['id']);
					$this->ActionIndex();
				}
				else
				{
					$this->ActionIndex();
				}
			}
			else
			{
				
				$_SESSION['msg'] = new Message('Error!','You dont have permission to call this action.');
				Route::Home();
			}
		}
		
		function ActionAdd()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
				if (isset($_POST['Title']))
				{
					$this->model->Add($_POST, $_FILES['Photo']);
					
					$this->ActionIndex();
				}
				else
				{
					$data['title'] = "Добавить статью";
					$this->view->generate('ArticlesAdd.php', 'GeneralLayout.php', $data);
				}
			}
			else
			{
				$_SESSION['msg'] = new Message('Error!','You dont have permission to visit this page.');
				Route::Home();
			}
		}

		function ActionView()
		{
			if (isset($_GET['id']))
			{
				$this->model->UpdateViews($_GET['id']);
				$data['a'] = $this->model->ChangeName($this->model->GetForView($_GET['id']));
				$data['title'] = $data['a']->Title;
				$this->view->generate('ArticlesPost.php', 'GeneralLayout.php', $data);
			}
		}
	}

?>