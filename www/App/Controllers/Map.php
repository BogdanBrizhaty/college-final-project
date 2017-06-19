<?php 

	class MapController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			// $this->model = new HomeModel();
		}
		public function ActionIndex()
		{
			$data['title'] = "Новости";
			// $data['recentNews'] = $this->model->GetRecentNews();
			// $data['popArticles'] = $this->model->GetPopularArticles();
			// $data['popSights'] = $this->model->GetPopularSights();
			$this->view->generate('News.php', 'GeneralLayout.php', $data);
		}
	}

?>