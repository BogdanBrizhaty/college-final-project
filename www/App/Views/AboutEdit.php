
	<div class="post_title">
		<strong>Редактировать раздел "О проекте"</strong>
	</div>
	<div class="post_body">
		<form action="" enctype="multipart/form-data" method="post">
			<textarea name="Text" id="editor1" width="100%" cols="80"><?php echo $text; ?></textarea>
			<br/>
			<input type="submit" value="Отправить" class="green_button"/>
			<a href="/about" title="Отмена" >
				<input type="button" value="Отмена" class="white_button" />
			</a>
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