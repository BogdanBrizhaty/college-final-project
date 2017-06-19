<?php
	foreach ($articles as $a)
	{
		echo '
			<div class="yellow_block">
				<div class="post_title">
					'.$a->Title.'
				</div>
				<div class="post_body" style="text-align:center;">
					<img src="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$a->Preview.'" align="center" width="500"/>
					<br/><br/>
					<div style="text-align:justify;border-top:1px solid #E1E5E8; padding-top:5px;">
						<div style="max-height:75px; overflow:hidden;">
							'.$a->Content.'
						</div>
					</div>
				</div>
				<div class="post_footer">
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/AccountIcon.svg" height="17" align="center"/> ['.$a->Author.']
					&nbsp;&nbsp;&nbsp; 
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/ClockIcon.svg" height="14" align="center"/> '.$a->CreationDate.'
					&nbsp;&nbsp;&nbsp;
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/ViewsIcon.svg" height="22" align="center"/>'.$a->Views.'
					<div style="float:right;">
						<a href="/articles/view?id='.$a->Id.'" title="Читать далее" >
							<input type="button"  value="Читать далее" class="yellow_button" style="padding:3px;"/>
						</a>';
					if (AuthProvider::GetInstance()->IsAuthenticated())
					{
						echo '	&nbsp;&nbsp;
						<a href="/articles/edit?id='.$a->Id.'" title="Редактировать" >
							<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/EditIcon.svg" height="18" align="center"/>
						</a>
						&nbsp;&nbsp;
						<a href="/articles/delete?id='.$a->Id.'" title="Удалить" >
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
	
	echo '<div style="text-align:center;">'.PageHelper($TotalPages, $CurrentPage, 'articles').'</div>';
?>
