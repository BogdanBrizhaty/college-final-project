<?php 

	class GalleryController extends BaseController
	{
		
		function __construct()
		{
			parent::__construct();
			$this->model = new GalleryModel();
		}
		public function ActionIndex()
		{
			$data['title'] = "Галерея";
			$data['photos'] = $this->model->GetPhotos();
			$this->view->generate('Gallery.php', 'GeneralLayout.php', $data);
		}

		function ActionList()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
					$data['title'] = "Все фотографии";
					$data['photos'] = $this->model->GetPhotos();
					$this->view->generate('GalleryList.php', 'GeneralLayout.php', $data);
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
					$this->ActionList();
				}
				else
				{
					$this->ActionIndex();
				}
			}
			else
			{
				$_SESSION['msg'] = new Message('Error!','You dont have permission to visit this page.');
				Route::Home();
			}
		}
		
		function ActionAdd()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
				if (isset($_POST['Description']))
				{
					$this->model->Add($_POST, $_FILES['FileName']);
					Route::Home();
				}
				else
				{
					$data['title'] = "Добавить фотографию";
					$this->view->generate('GalleryAdd.php', 'GeneralLayout.php', $data);
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