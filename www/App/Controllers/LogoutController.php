<?php 

	class LogoutController extends BaseController
	{
		public function ActionIndex()
		{
			AuthProvider::GetInstance()->Logout();
			Route::Home();
		}
	}

?>