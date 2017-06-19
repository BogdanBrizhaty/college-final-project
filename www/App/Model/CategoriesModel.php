<?php

	require_once('Domain/Category.php');
	require_once('DAL/CategoriesRepository.php');
	class CategoriesModel extends BaseModel
	{
		function __construct()
		{
			parent::__construct(new CategoriesRepository());
		}
		
		function GetCats()
		{
			return $this->Repository->Get(0, 0, '');
		}
		
		function Add($name)
		{
			$name = htmlspecialchars(trim($name), ENT_QUOTES);
			$cat = new Category(0, $name);
			$this->Repository->Add($cat);
		}
		function Edit($id, $name)
		{
			$cat = new Category($id, $name);
			$this->Repository->Update($cat);
		}
		function Delete($cid)
		{
			$id = intval($cid);
			$this->Repository->Delete($id);
		}
		function GetForView($cid)
		{
			$id = intval($cid);
			return $this->Repository->GetById($id);
		}
	}

?>
