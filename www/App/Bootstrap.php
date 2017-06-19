<?php

	// подключаем файлы ядра
	require_once 'Core/BaseModel.php';
	require_once 'Core/BaseView.php';
	require_once 'Core/BaseController.php';
	
	//
	// session_start();
	require_once 'App/Model/Message.php';
	
	// Libs\class.upload.php-master\src
	// require_once 'App/settings.php';
	require_once 'Libs/class.upload.php-master/src/class.upload.php';
	require_once 'Model/AuthProvider.php';
	require_once('App/Model/Domain/User.php');
	require_once 'Model/upl.php';
	require_once 'Views/PageHelper.php';
	session_start();
	/*
	Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	*/

	require_once 'Model/DAL/Connection.php';
	// Connection::GetInstance();
	Connection::GetInstance()->Connect();
	AuthProvider::GetInstance()->CookieAuth();
	
	require_once 'Core/Route.php';
	Route::start(); // запускаем маршрутизатор

?>