	<div class="post_body">
		<div id="gallery">
			<?php
			foreach($photos as $ph)
			{
				echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/uploads/gallery/'.$ph->FileName.'"><img src="http://'.$_SERVER['HTTP_HOST'].'/uploads/gallery/'.$ph->FileName.'" alt="'.$ph->Descr.'" /></a>';
			}
			?>
		</div>		
		<div id="menubar">
			<?php
				if (AuthProvider::GetInstance()->IsAuthenticated())
					echo '
						<a href="/gallery/add" title="Добавить" >
							<input type="button" value="Добавить" class="blue_button" />
						</a>
						&nbsp;&nbsp;
						<a href="/gallery/list" title="Все фотографии" >
							<input type="button" value="Все фотографии" class="blue_button" />
						</a>';
			?>
		</div>		
			
	</div>				
		<link rel="stylesheet" type="text/css" media="all" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/plugins/jgallery-1.5.5/dist/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/plugins/jgallery-1.5.5/dist/css/jgallery.min.css?v=1.5.5" />
		<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/plugins/jgallery-1.5.5/dist/js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/plugins/jgallery-1.5.5/dist/js/jgallery.min.js?v=1.5.5"></script>
		<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/plugins/jgallery-1.5.5/dist/js/touchswipe.min.js"></script>
				
		<script type="text/javascript">
				$( document ).ready( function(){
					$( '#gallery' ).jGallery( {
						"transitionCols":"1",
						"transitionRows":"1",
						"thumbnailsPosition":"bottom",
						"thumbType":"image",
						"backgroundColor":"FFFFFF",
						"textColor":"000000",
						"mode":"standard"
					} );
				} );
		</script>