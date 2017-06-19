<?php 

	class SightsController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			$this->model = new SightsModel();
		}
		public function ActionIndex()
		{
			$data['title'] = "Достопримечательности";
			$ItemsPerPage = 5;
			$CurrentPage = 1;

			$data['cats'] = $this->model->GetCategories(); //important
			
			
			if (isset($_GET['category']))
			{
				$category = intval($_GET['category']);
				// var_dump($category);
				// echo '1 branch';
				$TotalItems = $this->model->GetItemsCount($category);
				$TotalPages = ceil($TotalItems / $ItemsPerPage);
				if (isset($_GET['page']))
				{
					$CurrentPage = intval($_GET['page']);
					if ($CurrentPage==null or $CurrentPage<1 or $CurrentPage>$TotalPages) 
					{
						$CurrentPage = 1;
					}
				}

				$data['sights'] = $this->model->SetAuthorName($this->model->GetSights($ItemsPerPage, $CurrentPage, $category));
			}
			else
			{
				$TotalItems = $this->model->GetItemsCount();
				$TotalPages = ceil($TotalItems / $ItemsPerPage);
				if (isset($_GET['page']))
				{
					$CurrentPage = intval($_GET['page']);
					if ($CurrentPage==null or $CurrentPage<1 or $CurrentPage>$TotalPages) 
					{
						$CurrentPage = 1;
					}
				}
				$data['sights'] = $this->model->SetAuthorName($this->model->GetSights($ItemsPerPage, $CurrentPage));
			}
			


			$data['CurrentPage'] = $CurrentPage;
			$data['TotalPages'] = $TotalPages;
			
			
			
			$this->view->generate('Sights.php', 'GeneralLayout.php', $data);
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
						$data['s'] = $this->model->GetForView($_GET['id']);
						$data['categories'] = $this->model->GetCategories();
						$data['title'] = "Редактирование достопримечательности";
						$this->view->generate('SightsEdit.php', 'GeneralLayout.php', $data);
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
					$data['title'] = "Добавить достопримечательность";
					$data['categories'] = $this->model->GetCategories();
					$this->view->generate('SightsAdd.php', 'GeneralLayout.php', $data);
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
				$data['cats'] = $this->model->GetCategories(); //important
				$data['s'] = $this->model->ChangeName($this->model->GetForView($_GET['id']));
				$data['title'] = $data['s']->Title;
				$this->view->generate('SightsPost.php', 'GeneralLayout.php', $data);
			}
		}
	}

?>