	<div class="post_body">
			<a href="/gallery/add" title="Добавить" >
				<input type="button" value="Добавить фото" class="blue_button" />
			</a>
	</div>
	<div class="post_body">
		<?php 
			foreach($photos as $ph)
			{
				echo '
					<div style="border-bottom:1px solid #E1E5E8; padding-bottom:5px; padding-top:5px;" >
						<div style="display:inline-block; width:15%;">
							<a href="http://'.$_SERVER['HTTP_HOST'].'/uploads/gallery/'.$ph->FileName.'">
								<img align="center" src="http://'.$_SERVER['HTTP_HOST'].'/uploads/gallery/'.$ph->FileName.'" height="50"  />
							</a>
						</div>
						<div style="display:inline-block; margin-left:15px; width:70%;">
						'.$ph->Descr.'
						</div>
						<div style="display:inline-block; margin-left:15px; width:10%;">
							<a href="/gallery/delete?id='.$ph->Id.'" title="Удалить" >
								<input type="button" value="Удалить" class="yellow_button" />
							</a>
						</div>
					</div>
				
				';
			}
		?>
	</div>