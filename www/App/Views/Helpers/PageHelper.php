<?php

	function PageHelper($TotalPages, $CurrentPage, $link)
	{
		
		$htmlstr = '<br/><br/>';
		
		unset($show_dots);
		$LinksCount = 5;
		$Separator = '&nbsp;';
		// $style = 'style="color: #808000; text-decoration: none;"';
		$style = 'class="pagenum"';
		$FirstLink = $CurrentPage - intval($LinksCount/2);
		
		if ($FirstLink > 2 and $TotalPages - $LinksCount > 2)
		{
			$htmlstr .= '<a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'/'.$link.'?page=1> |< </a> ';
		}
		for ($j = 0; $j <= $LinksCount; $j++) // Основный цикл вывода ссылок
		{
			$i = $FirstLink + $j; // Номер ссылки
			// Если страница рядом с началом, то увеличить цикл для того,
			// чтобы количество ссылок было постоянным
			if ($i < 1) continue;
			// Подобное находится в верхнем цикле
			if (!isset($show_dots) && $FirstLink > 1) 
			{
				$htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'/'.$link.'?page='.($i-1).'><b>...</b></a> ';
				$show_dots = "no";
			}
			// Номер ссылки перевалил за возможное количество страниц
			if ($i > $TotalPages) break;
			if ($i == $CurrentPage) 
			{
				$htmlstr .= ' <a '.$style.' ><div style="display:inline-block; color:white;  text-align:center; background-color:#0BF; height:35px; width:35px; padding-top:10px; cursor:default;">'.$i.'</div></a> ';
			} 
			else 
			{
				$htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'/'.$link.'?page='.$i.'><div style="display:inline-block; text-align:center; background-color:transparent; height:35px; width:35px; padding-top:10px; ">'.$i.'</div></a> ';
			}
			// Если номер ссылки не равен кол. страниц и это не последняя ссылка
			if (($i != $TotalPages) && ($j != $LinksCount)) echo $Separator;
			// Вывод "..." в конце
			if (($j == $LinksCount) && ($i < $TotalPages)) 
			{
				$htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'//'.$link.'?page='.($i+1).'><div style="display:inline-block; text-align:center; background-color:transparent; height:35px; width:35px; padding-top:10px;"><b>...</b></div></a> ';
			}
		}
		if ($FirstLink + $LinksCount + 1 < $TotalPages) 
		{
			$htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'/'.$link.'?page='.$TotalPages.'><div style="display:inline-block; text-align:center; background-color:transparent; height:35px; width:35px; padding-top:10px;">&nbsp;>|&nbsp;</div></a>';
		}
		return $htmlstr;
		
	
	}

?>