<div style="width:80%; margin-left:10%;">
	<div>
	<div>
		<div class="post_title" >
			<strong>Херсонщину можно сравнить с небольшой сказочной страной...</strong>
		</div>
		<div class="post_body">
			<div style="text-align:center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/resources/img/head.png" style="width:70%;" /></div>	
		<br/>
				... в которой есть все условия для достойного существования. Величественные озера, могучий Днепр, что через лиман впадает в Черное море, речушки, что катятся оврагами, - все это  отражает в себе красоту садов, которые славятся на всю страну своими урожаями. Невероятные сорта винограда растут на Херсонщине, а вино, созданное натруженными руками, и которое давно уже прославилось далеко за пределами Украины, приравнивают к напиткам древнегреческих богов. Славные арбузы, помидоры, капуста, выращенные жителями этого края, известны всей стране. Есть здесь и опытные хозяйства, занимающиеся выращиванием элитных сортов семян, консервные и молочные заводы, мельницы, хозяйства по выращиванию рыбы, птицефермы – и все они пытаются создать самые лучшие условия для жизни людей!
		</div>	
	</div>
		<br/><br/>
		<div class="post_title" >
			<strong>Последние новости</strong>
		</div>
		<?php
		
		foreach($recentNews as $rc)
		{
			echo '
				<div class="blue_block">
					<div class="post_title">
						'.$rc->Title.'
											<div style="float:right; ">
							
							<a href="/news/view?id='.$rc->Id.'" title="Читать далее" >
								<input type="button"  value="Читать далее" class="blue_button" style="padding:3px;"/>
							</a>
						</div>
					</div>
					<div class="post_body" style="text-align:center;">
						<div>
							<div style="display:inline-block; width:20%; overflow:hidden;">
								<img src="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$rc->Preview.'" align="center" height="150"/>
							</div>
							<div style="display:inline-block; width:75%; max-height:75px; padding-left:15px; text-align:justify; overflow:hidden; float:right;">
							Добавлено ['.$rc->CreationDate.']
							<br/>
							<br/>
							'.$rc->Content.'
							</div>
						</div>
					</div>
				</div>

			';
		}
		?>
		
		<br/>
		<br/>

			<div class="post_title" >
			<strong>Популярные достопримечательности</strong>
		</div>
		<?php
		
		foreach($popSights as $ps)
		{
			echo '
				<div class="green_block">
					<div class="post_title">
						'.$ps->Title.'
							<div style="float:right; ">
							
							<a href="/news/view?id='.$ps->Id.'" title="Читать далее" >
								<input type="button"  value="Просмотреть" class="green_button" style="padding:3px;"/>
							</a>
						</div>
					</div>
					<div class="post_body" style="text-align:center;">
						<div style="text-align:center;">
								<img src="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$ps->Preview.'" align="center" style="width:70%;"/>
						</div>
					</div>
				</div>

			';
		}
		?>
		<br/>
		<br/>

			<div class="post_title" >
			<strong>Популярные статьи</strong>
		</div>
		<?php
		
		foreach($popArticles as $pa)
		{
			echo '
				<div class="yellow_block">
					<div class="post_title">
						'.$pa->Title.'
											<div style="float:right; ">
							
							<a href="/news/view?id='.$pa->Id.'" title="Читать далее" >
								<input type="button"  value="Читать далее" class="yellow_button" style="padding:3px;"/>
							</a>
						</div>
					</div>
					<div class="post_body" style="text-align:center;">
						<div>
							<div style="display:inline-block; width:20%; overflow:hidden;">
								<img src="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$pa->Preview.'" align="center" height="150"/>
							</div>
							<div style="display:inline-block; width:75%; max-height:75px; padding-left:15px; text-align:justify; overflow:hidden; float:right;">
							Добавлено ['.$pa->CreationDate.']
							<br/>
							<br/>
							'.$pa->Content.'
							</div>
						</div>
					</div>
				</div>

			';
		}
		?>
	</div>

</div>