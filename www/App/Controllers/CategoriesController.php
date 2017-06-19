<?php 

	class CategoriesController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			$this->model = new CategoriesModel();
		}
		public function ActionIndex()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
				$data['title'] = "Категории";
				$data['cats'] = $this->model->GetCats();
				$this->view->generate('Categories.php', 'GeneralLayout.php', $data);
			}
			else
			{
				$_SESSION['msg'] = new Message('Error!','You dont have permission to visit this page.');
				Route::Home();
			}
		}
		
		function ActionEdit()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
				if (isset($_POST['Name']))
				{
					$this->model->Edit($_GET['id'], $_POST['Name']);
					$this->ActionIndex();
				}
				else
				{
					if (isset($_GET['id']))
					{
						$data['cat'] = $this->model->GetForView($_GET['id']);
						$data['title'] = "Редактирование категории";
						#	то чувство
						#	когда ты не понимаешь, почему не работает твой код
						#	а потом ты обнаруживаешь, что просто забыл вызвать метод, его исполняющий
						$this->view->generate('CategoriesEdit.php', 'GeneralLayout.php', $data);
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
				if (isset($_POST['Name']))
				{
					$this->model->Add($_POST['Name']);
					
					$this->ActionIndex();
				}
				else
				{
					$data['title'] = "Добавить категорию";
					$this->view->generate('CategoriesAdd.php', 'GeneralLayout.php', $data);
				}
			}
			else
			{
				$_SESSION['msg'] = new Message('Error!','You dont have permission to visit this page.');
				Route::Home();
			}
		}
	}

?>