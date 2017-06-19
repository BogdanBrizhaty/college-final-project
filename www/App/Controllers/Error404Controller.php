<?php 

	class Error404Controller extends BaseController
	{
		public function ActionIndex()
		{
			$data['title'] = "Error 404: Page not found";
			$this->view->generate('Error404View.php', 'GeneralLayout.php', $data);
		}
	}

?>