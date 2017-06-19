<?php

	function PageHelper($TotalPages, $CurrentPage, $link)
	{
		
		$htmlstr = '<br/><br/>';
		
		unset($show_dots);
		$LinksCount = 5;
		$Separator = '&nbsp;';
		// $style = 'style="color: #808000; text-decoration: none;"';
		$style = 'class="blue_button"';
		$FirstLink = $CurrentPage - intval($LinksCount/2);
		
		if ($FirstLink > 2 and $TotalPages - $LinksCount > 2)
		{
			$htmlstr .= '<a href="/'.$link.'?page=1"><input type="button" '.$style.' value="|<" /></a>';
			// $htmlstr .= '<a '.$style.' href="/'.$link.'?page=1"> |< </a> ';
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
				$htmlstr .= '<a href="/'.$link.'?page=1"><input type="button" '.$style.' value="'.$i.'" /></a>';
				// $htmlstr .='<';
			//	$htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'/'.$link.'?page='.($i-1).'><b>...</b></a> ';
				$show_dots = "no";
			}
			// Номер ссылки перевалил за возможное количество страниц
			if ($i > $TotalPages) break;
			if ($i == $CurrentPage) 
			{
				$htmlstr.= '<input type="button" class="act_btn" style="cursor:default;" value="'.$i.'"/>';
				// $htmlstr .= ' <a '.$style.' ><input type="button" class="">'.$i.'/></a> ';
			} 
			else 
			{
				$htmlstr .= '<a href="/'.$link.'?page='.$i.'"><input type="button" '.$style.' value="'.$i.'" /></a>';
				//$htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'/'.$link.'?page='.$i.'><div class="">'.$i.'</div></a> ';
			}
			// Если номер ссылки не равен кол. страниц и это не последняя ссылка
			if (($i != $TotalPages) && ($j != $LinksCount)) echo $Separator;
			// Вывод "..." в конце
			if (($j == $LinksCount) && ($i < $TotalPages)) 
			{
				$htmlstr .= '<a href="/'.$link.'?page='.($i+1).'"><input type="button" '.$style.' value="..." /></a>';
				//$htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'//'.$link.'?page='.($i+1).'><div class=""><b>...</b></div></a> ';
			}
		}
		if ($FirstLink + $LinksCount + 1 < $TotalPages) 
		{
			$htmlstr .= '<a href="/'.$link.'?page='.$TotalPages.'"><input type="button" '.$style.' value="..." /></a>';
			// $htmlstr .= ' <a '.$style.' href=http://'.$_SERVER['HTTP_HOST'].'/'.$link.'?page='.$TotalPages.'><div class="">&nbsp;>|&nbsp;</div></a>';
		}
		return $htmlstr;
		
	
	}

?>