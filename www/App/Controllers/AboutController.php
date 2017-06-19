<?php 

	// require_once('DAL/UserRepository.php');

	class AboutController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			$this->model = new AboutModel();
		}
		public function ActionIndex()
		{
			$data['title'] = "О проекте";
			$data['text'] = $this->model->GetData();
			$this->view->generate('About.php', 'GeneralLayout.php', $data);
		}
		
		function ActionEdit()
		{
			if (AuthProvider::GetInstance()->IsAuthenticated())
			{
				if (isset($_POST['Text']))
				{
					$this->model->SetData($_POST['Text']);
					Route::Home();
				}
				else
				{
					$data['title'] = "Редактировать информацию о проекте";
					$data['text'] = $this->model->GetData();
					$this->view->generate('AboutEdit.php', 'GeneralLayout.php', $data);
				}
			}
			else
			{
				$_SESSION['msg'] = new Message('Error!','You dont have permission to visit this page.');
				Route::Home();
			}
		}
		
	}//if (AuthProvider::GetInstance()->IsAuthenticated())

?>