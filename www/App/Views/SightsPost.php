<?php
		echo '
			<div class="green_block">
				<div class="post_title">
					'.$s->Title.'
				</div>
				<div class="post_body" style="text-align:center;">
					<img src="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$s->Preview.'" align="center" width="500"/>
					<br/><br/>
					<div style="text-align:justify;border-top:1px solid #E1E5E8; padding-top:5px;">'.$s->Content.'</div>
					<br/><br/>
					<div style="text-align:left; border-top:1px solid #E1E5E8; padding-top:5px;">
					<strong>Поделиться</strong> <div class="ya-share2" style="float:right;" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,blogger,lj"></div>
					</div>
				</div>
				<div class="post_footer">
					
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/AccountIcon.svg" height="17" align="center"/> ['.$s->Author.']&nbsp;&nbsp;&nbsp; 

					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/ClockIcon.svg" height="14" align="center"/> '.$s->CreationDate.'
					
					&nbsp;&nbsp;&nbsp;
					
					<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/ViewsIcon.svg" height="22" align="center"/>'.$s->Views.'';
					
					if (AuthProvider::GetInstance()->IsAuthenticated())
					{
						echo '					<div style="float:right;">
						<a href="/sights/edit?id='.$s->Id.'" title="Редактировать" >
							
							<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/EditIcon.svg" height="18" align="center"/>
						</a>
						&nbsp;&nbsp;
						<a href="/sights/delete?id='.$s->Id.'" title="Удалить" >
							<img src="http://'.$_SERVER['HTTP_HOST'].'/resources/img/DeleteIcon.svg" height="18" align="center"/>
						</a>
					</div>';
					}
					//<input type="button"  value="Редактировать" class="yellow_button" style="padding:3px;"/>
					echo '

				</div>
			</div>		
		';
?>
								<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
								<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
