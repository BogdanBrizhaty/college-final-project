<footer >
	<?php
		// if (isset($_SESSION['AuthenticatedUser']))
		// {
			if (AuthProvider::GetInstance()->IsAuthenticated())	
			{
				// echo '<a href="/logout" title="exit">exit</a>';
			}
			else
			{
				echo '<a href="/login" title="login">Login</a>';
			}
		// }
		// else 
			// echo '<a href="/login" title="login">Login</a>';
	?>
	
	<div style="width:90%;float:left; background-color:#242424;">
		<div style=" background-color:#242424; text-align:center; width:50%; margin-top:20px; margin-left:30%; height:2em;">
			<div>
				<a class="footer_link" href = "/feedback" title="Обратная связь"><span>Обратная связь</span></a>
				<span style="cursor:default;">&nbsp;|&nbsp;</span>
				<a class="footer_link" href = "/about" title="О нас"><span>О нас</span></a>
			</div>
		</div>
		<div style=" background-color:#242424; text-align:center; height:30px; width:50%; float:left; margin-top:10px; margin-left:30%;">
			<span style="background-color:#242424;">Мы в соцсетях:&nbsp;</span><br/>
			<a target="blank" href = "https://vk.com/hot_nk" title="Горячий Новокаховский" style="background-color:#242424;"><img height="38" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/resources/img/vk3icon.svg"/></a>&nbsp;
			<a target="blank" href = "https://www.facebook.com/Hot.Nova.Kakhovka/"style="background-color:#242424;" title="Горячий Новокаховский"><img height="35" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/resources/img/facebook3icon.svg"/></a>&nbsp;
			<a target="blank" href = "https://www.instagram.com/hot.nk/"style="background-color:#242424;" title="Горячий Новокаховский"><img height="38" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/resources/img/inst3icon.svg"/></a>
		</div>
	</div>
	<div style="width:10%; float:right;background-color:#242424;">
		<span style="" style="background-color:#242424;"><br/><br/><br/>Copyright &copy; 2016</span>
	</div>