<?php
	foreach ($news as $n)
	{
		echo '
			<div class="blue_block">
				<div class="post_title">
					'.$n->Title.'
				</div>
				<div class="post_body" style="text-align:center;">
					<img src="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$n->Preview.'" align="center" width="500"/>
					<br/><br/>
					<div style="text-align:justify;border-top:1px solid #E1E5E8; padding-top:5px;">
						<div style="max-height:75px; overflow:hidden;">
							'.$n->Content.'
						</div>
					</div>
				</div>
				<div class="post_footer">
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/AccountIcon.svg" height="17" align="center"/> ['.$n->Author.']
					&nbsp;&nbsp;&nbsp; 
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/ClockIcon.svg" height="14" align="center"/> '.$n->CreationDate.'
					&nbsp;&nbsp;&nbsp;
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/ViewsIcon.svg" height="22" align="center"/>'.$n->Views.'
					<div style="float:right;">
						<a href="/news/view?id='.$n->Id.'" title="Читать далее" >
							<input type="button"  value="Читать далее" class="blue_button" style="padding:3px;"/>
						</a>';
					if (AuthProvider::GetInstance()->IsAuthenticated())
					{
						echo '	&nbsp;&nbsp;
						<a href="/news/edit?id='.$n->Id.'" title="Редактировать" >
							<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/EditIcon.svg" height="18" align="center"/>
						</a>
						&nbsp;&nbsp;
						<a href="/news/delete?id='.$n->Id.'" title="Удалить" >
							<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/DeleteIcon.svg" height="18" align="center"/>
						</a>';
					}
						echo '
					</div>
				</div>
			</div>
			<br/>
			
		';
	}
	
	echo '<div style="text-align:center;">'.PageHelper($TotalPages, $CurrentPage, 'news').'</div>';
?>
