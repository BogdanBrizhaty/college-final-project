<?php 

	class FeedbackController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			$this->model = new FeedbackModel();
		}
		public function ActionIndex()
		{
			if (isset($_POST['Email']))
			{
				$this->model->SendMail($_POST);
				Route::Home();
			}
			else
			{
				$data['title'] = "Обратная связь";
				$this->view->generate('Feedback.php', 'GeneralLayout.php', $data);
			}
		}
	}

?>