<?php

	require_once('App/Model/DAL/IRepository.php');

	class BaseModel
	{
		protected $Repository;
		public function __construct(IRepository $Repository)
		{
			$this->Repository = $Repository;
		}
	}
?>