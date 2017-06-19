<?php 

	class SearchController extends BaseController
	{
		public function ActionIndex()
		{
			echo $_GET['val'];
			// $data['title'] = "Error 404: Page not found";
			// $this->view->generate('Error404View.php', 'GeneralLayout.php', $data);
		}
	}

?>