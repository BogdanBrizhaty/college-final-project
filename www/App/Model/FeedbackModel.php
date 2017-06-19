<?php

	require_once('DAL/UserRepository.php');

	class FeedbackModel extends BaseModel
	{
		function __construct()
		{
			parent::__construct(new UserRepository(Connection::GerInstance()->GetConnection()));
		}
		
		function SendMail($post)
		{
			var_dump($post);
			$msg = htmlspecialchars(trim($post['Msg']), ENT_QUOTES);
			$name = htmlspecialchars(trim($post['Name']), ENT_QUOTES);
			$email = htmlspecialchars(trim($post['Email']), ENT_QUOTES);
			
			
			// mail()
			mail('demaskinas@yandex.ua', "New feedback received", "From: ".$name.", ".$email."\r\nAt ".date("Y:m:d")."\r\nТекст сообщения:\r\n".$msg);
		}
	}

?>
