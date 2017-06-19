	<div class="post_body">
		<form action="" enctype="multipart/form-data" method="post">
			<div style="height:400px;">
				<div class="form_left_col" style="height:30px;">
					Заголовок
				</div>
				
				<div class="form_right_col" style="height:30px;" >
					<input type="text" style="width:100%;"  name="Title" value="<?php echo $s->Title; ?>" required/>
				</div>
				<div class="form_left_col" style="height:30px;">
					Категория
				</div>
				
				<div class="form_right_col" style="height:30px;" >
					<select style="width:100%;"  name="Category" required>
						<?php
							foreach($categories as $cat)
							{
								$selected = "";
								if ($cat->Id==$s->Category) $selected = " selected ";
								echo '<option value="'.$cat->Id.'" '.$selected.' >'.$cat->Name.'</option>';
							}
						?>
					</select>
				</div>
				<div class="form_left_col" style="height:30px;">
					Фото
				</div>
				<div class="form_right_col"style="height:30px;">
					<input type="file" style="width:100%;"  name="Photo"/>
				</div>
				<div class="form_left_col" style="height:30px;">
					Текст
				</div>
				<div class="form_right_col">
					<textarea id="editor1" style="width:100%;max-width:100%; max-height:325px; height:325px;"  name="Text" required><?php echo $s->Content; ?></textarea>
				</div><br/>
			</div>
			<br/>
			<div>
				<input type="submit" value="Отправить" class="green_button"/>
				<a href="/news" title="Отмена" >
					<input type="button" value="Отмена" class="white_button" />
				</a>
			</div>
		</form>
			
	</div>
	
		<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Plugins/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">						
		CKEDITOR.replace('editor1', {'filebrowserBrowseUrl':'http://<?php echo $_SERVER['HTTP_HOST']; ?>/Plugins/kcfinder/browse.php?type=files',
		'filebrowserImageBrowseUrl':'http://<?php echo $_SERVER['HTTP_HOST']; ?>/Plugins/kcfinder/browse.php?type=images',
		'filebrowserFlashBrowseUrl':'http://<?php echo $_SERVER['HTTP_HOST']; ?>/Plugins/kcfinder/browse.php?type=flash',
		'filebrowserUploadUrl':'http://<?php echo $_SERVER['HTTP_HOST']; ?>/Plugins/kcfinder/upload.php?type=files',
		'filebrowserImageUploadUrl':'http://<?php echo $_SERVER['HTTP_HOST']; ?>/Plugins/kcfinder/upload.php?type=images',
		'filebrowserFlashUploadUrl':'http://<?php echo $_SERVER['HTTP_HOST']; ?>/Plugins/kcfinder/upload.php?type=flash'});
	</script>