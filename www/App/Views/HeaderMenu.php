<div id="MainMenu">
	<?php
		$htmlstr = '';
		if ($title=="Главная") 
		{
			$htmlstr.='
				<div class="header_navigation_button_active">
					<span class="header_navigation_span_container">
						Главная
					</span>
				</div>
					';
		}
		else 
		{
			$htmlstr.='
				<a href="/" title="Главная" class="header_navigation_button">
					<span class="header_navigation_span_container">
						Главная
					</span>
				</a>
					';
		}
		if ($title=="Новости") 
		{
			$htmlstr.='
				<div class="header_navigation_button_active">
					<span class="header_navigation_span_container">
						Новости
					</span>
				</div>
					';
		}
		else 
		{
			$htmlstr.='
				<a href="/news" title="Новости" class="header_navigation_button">
					<span class="header_navigation_span_container">
						Новости
					</span>
				</a>
					';		
		}
		if ($title=="Статьи") 
		{
			$htmlstr.='
				<div class="header_navigation_button_active">
					<span class="header_navigation_span_container">
						Статьи
					</span>
				</div>
					';
		}
		else 
		{
			$htmlstr.='
				<a href="/articles" title="Статьи" class="header_navigation_button">
					<span class="header_navigation_span_container">
						Статьи
					</span>
				</a>
					';		
		}
		if ($title=="Достопримечательности") 
		{
			$htmlstr.='
				<div class="header_navigation_button_active">
					<span class="header_navigation_span_container">
						Достопримечательности
					</span>
				</div>
					';
		}
		else 
		{
			$htmlstr.='
				<a href="/sights" title="Достопримечательности" class="header_navigation_button">
					<span class="header_navigation_span_container">
						Достопримечательности
					</span>
				</a>
					';		
		}
		if ($title=="Галерея") 
		{
			$htmlstr.='
				<div class="header_navigation_button_active">
					<span class="header_navigation_span_container">
						Галерея
					</span>
				</div>
					';
		}
		else 
		{
			$htmlstr.='
				<a href="/gallery" title="Галерея" class="header_navigation_button">
					<span class="header_navigation_span_container">
						Галерея
					</span>
				</a>
					';		
		}
		if ($title=="История региона") 
		{
			$htmlstr.='
				<div class="header_navigation_button_active">
					<span class="header_navigation_span_container">
						История
					</span>
				</div>
					';
		}
		else 
		{
			$htmlstr.='
				<a href="/history" title="История" class="header_navigation_button">
					<span class="header_navigation_span_container">
						История
					</span>
				</a>
					';		
		}
		if ($title=="О проекте") 
		{
			$htmlstr.='
				<div class="header_navigation_button_active">
					<span class="header_navigation_span_container">
						О проекте
					</span>
				</div>
					';
		}
		else 
		{
			$htmlstr.='
				<a href="/about" title="О проекте" class="header_navigation_button">
					<span class="header_navigation_span_container">
						О проекте
					</span>
				</a>
					';		
		}
		echo $htmlstr;

		?>
</div>
<?php

	/*	echo '
			<div class="aaaa" style="background-color:white;float:right; cursor:pointer; margin-right:10%; margin-top:7px; height:25px; border-radius:1px;padding:5px;">
				<img onClick="SearchPressed()" src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/SearchIcon.svg" style="float:right; margin-left:1px;" height="25" />
				<input  id="searchfield" style="border:none; height:25px; outline:none; margin-top:0px; margin-left:5px; width:225px; border-right:2px solid #E1E5E8;" value=""/>
			</div>';*/
?>

<script>
		
var status = "closed";
$( document ).ready(function() {
	$("#searchfield").hide();
});

	function SearchPressed()
	{
		var f =  document.getElementById('searchfield');
		if (f.value!='')
		{
			location.replace('/search?val='+f.value);
		}
		else
		{
			if (status=="closed")
			{
				$("#searchfield").show();
				status = "opened";
			}
			else
			{
				$("#searchfield").hide();
				status = "closed";			
			}
		}
	}
</script>