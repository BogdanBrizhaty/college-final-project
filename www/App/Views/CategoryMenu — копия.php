<div id="cat_menu" style="margin-top:50px;">
	<div id = "" style="margin-left:10%;">
		<?php
			require_once 'App/Model/Domain/Category.php';
			/*$cats = array(
				'1' => new Category(1,'cat_name'),
				'2' => new Category(2,'cat_name'),
				'3' => new Category(3,'cat_name')
			);*/
				if (isset($cats))
				{
					foreach($cats as $c)
					{
						echo 
						'		<a href="#" title="'.$c->Name.'"><div class="navigation_link" style="">'.$c->Name.'</div></a>';
						
						$c->Name.' '.$c->Id.'<br/>';
					}
				}
		?>
		</div>
</div>