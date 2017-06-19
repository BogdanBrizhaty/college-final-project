<?php 

	class HomeController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			$this->model = new HomeModel();
		}
		public function ActionIndex()
		{
			$data['title'] = "Главная";
			
			$data['recentNews'] = $this->model->GetRecentNews();
			$data['popArticles'] = $this->model->GetPopularArticles();
			 $data['popSights'] = $this->model->GetPopularSights();
			$this->view->generate('Home.php', 'GeneralLayout.php', $data);
		}
	}

?>