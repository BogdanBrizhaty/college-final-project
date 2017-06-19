<?php 

	require_once('App/Model/DAL/CategoriesRepository.php');
	class SiteMapController extends BaseController
	{
		function __construct()
		{
			parent::__construct();
			//$this->model = new HistoryModel();
		}
		public function ActionIndex()
		{
			$data['title'] = "Карта сайта";
			$rep = new CategoriesRepository();
			$data['categories'] = $rep->Get(0,0);
			$this->view->generate('SiteMap.php', 'GeneralLayout.php', $data);
		}
	}

?>