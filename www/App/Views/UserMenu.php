<?php

	if (AuthProvider::GetInstance()->IsAuthenticated())
	{
		echo '
			<div>	
				<div class="user_menu_header" style="margin-left:5%; color:#8996a3;text-align:center; width:70%;">
					<div style="display:inline-block;" >
						'.$_SESSION['AuthenticatedUser']->Name.'
					</div>
					<div style="display:inline-block; float:right;">
						<a href="/logout" title="Выйти" style=" ">
							<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/LogoutIcon.png" height="20"/>
						</a>
					</div>
			</div>
			<div id="user_menu" style="">
				<div class="user_menu_header" style="">
					Добавить
				</div>
				<a href="/news/add" class="navigation_link" style="margin-left:5%; width:70%;">
					Новость
				</a>
				<a href="/articles/add" class="navigation_link" style="margin-left:5%; width:70%;">
					Статью
				</a>
				<a href="/sights/add" class="navigation_link" style="margin-left:5%; width:70%;">
					Достопримечательность
				</a>

				<div class="user_menu_header" style="">
					Управление
				</div>
				<a href="/gallery/list" class="navigation_link" style="margin-left:5%; width:70%;">
					Галерея
				</a>
				<a href="/categories" title="Категории" class="navigation_link" style="margin-left:5%; width:70%;">
					Категории
				</a>
				<a href="/history/edit" title="История края" class="navigation_link" style="margin-left:5%; width:70%;">
					История
				</a>
				<a href="/about/edit" title="О проекте" class="navigation_link" style="margin-left:5%; width:70%;">
					О проекте
				</a>
				</div>
			</div>
			';
	}

?>