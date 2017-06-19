<?php

?>
	<div class="post_title">
		<strong>Карта сайта</strong>
	</div>
	<div class="post_body">
		<div id="1col" style="display:inline-block; width:30%;">
			<ul style="margin-left:5%;  ">
				<li><a href="/" title="Главная">Главная</a></li>
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<?php 
					for ($i = 1; $i<sizeof($categories); ++$i)
					{
						echo '<li style="list-style-type:none;">&nbsp;</li>';
					}
				?>
				
			</ul>
		</div>
		<div id="2col" style="display:inline-block; width:30%;">
			<ul style="margin-left:5%;">
				<li><a href="/news" title="Новости">Новости</a></li>
				<li><a href="/articles" title="Статьи">Статьи</a></li>
				<li><a href="/gallery" title="Галерея">Галерея</a></li>
				<li><a href="/history" title="История региона">История региона</a></li>
				<li><a href="/about" title="О проекте">О проекте</a></li>
				<li><a href="/feedback" title="Обратная связь">Обратная связь</a></li>
				<li><a href="/sights" title="Достопримечательности">Достопримечательности</a></li>
								<?php 
					for ($i = 1; $i<sizeof($categories); ++$i)
					{
						echo '<li style="list-style-type:none;">&nbsp;</li>';
					}
				?>
			</ul>
		</div>
		<div id="3col" style="display:inline-block; width:30%;">
			<ul style="margin-left:5%;  ">
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<li style="list-style-type:none;">&nbsp;</li>
				<?php
					foreach ($categories as $category)
					{
						echo '
						<li><a href="/sights?category='.$category->Id.'" title="'.$category->Name.'">'.$category->Name.'</a></li>
						';
					}
				?>
				
			</ul>
		</div>
	</div>