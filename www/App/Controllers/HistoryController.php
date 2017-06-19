<?php 

	class HistoryController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			$this->model = new HistoryModel();
		}
		public function ActionIndex()
		{
			$data['title'] = "История региона";
			$data['text'] = $this->model->GetData();
			$this->view->generate('History.php', 'GeneralLayout.php', $data);
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
					$data['title'] = "Редактировать историю";
					$data['text'] = $this->model->GetData();
					$this->view->generate('HistoryEdit.php', 'GeneralLayout.php', $data);
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