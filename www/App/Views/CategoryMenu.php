<div id="cat_menu" style="">
	<div id = "" style="margin-left:10%;">
		<?php
			require_once 'App/Model/Domain/Category.php';
			/*$cats = array(
				'1' => new Category(1,'cat_name'),
				'2' => new Category(2,'cat_name'),
				'3' => new Category(3,'cat_name')
			);*/
				if (isset($cats) and !empty($cats) )
				{
					echo '
							<div id="cat_menu_header">
								Категории
							</div>
					';
					echo 
						'<a href="/sights" title="Все">
							<div class="navigation_link" style="">
								Все
							</div>
						</a>';

					foreach($cats as $c)
					{
						if (isset($_GET['category']))
						{
							if ($_GET['category']==$c->Id)
							{
								$style = "color:#007AFF;";
							}
							else
							{
								$style = "";
							}
						}
						else
						{
							$style = "";
						}
						echo 
						'<a href="/sights?category='.$c->Id.'" title="'.$c->Name.'">
							<div class="navigation_link" style="'.$style.'">
								'.$c->Name.'
							</div>
						</a>';
					}
				}
		?>
		</div>
</div>