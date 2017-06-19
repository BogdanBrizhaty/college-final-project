<?php 

	class LoginController extends BaseController
	{
		public function ActionIndex()
		{
			// echo 'llllll';
			if (isset($_POST['Login']) and isset($_POST['Password']))
			{
				AuthProvider::GetInstance()->Authenteficate($_POST['Login'], $_POST['Password']);
				Route::Home();
			}
			else 
			{
				$data['title'] = "Аутентификация";
				$this->view->generate('LoginView.php', 'GeneralLayout.php', $data);
			}
		}
	}

?>