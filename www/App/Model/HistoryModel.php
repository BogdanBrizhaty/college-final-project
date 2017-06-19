<?php

	require_once('DAL/UserRepository.php');

	class HistoryModel extends BaseModel
	{
		private $UserRepository;
		function __construct()
		{
			parent::__construct(new UserRepository());
		}
		
		function GetData()
		{
			$text = '';
			$fd = fopen("App/history.txt", 'r') or die("не удалось открыть файл");
			while(!feof($fd))
			{
				$text .= fgets($fd);
			}
			fclose($fd);
			return $text;
		}
		
		function SetData($text)
		{
			$fd = fopen("App/history.txt", 'w') or die("не удалось создать файл");
			fputs($fd, $text);
			fclose($fd);
		}
	}

?>
