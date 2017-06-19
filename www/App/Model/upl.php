<?php
	require_once('DAL/UserRepository.php');

	function upl($file)
	{
		$uploader = new upload($file);
		if ($uploader->uploaded)
		{
			$uploader->file_new_name_body = "img";
			$uploader->process('uploads/');
		}
		if ($uploader->processed)
		{
			$name = $uploader->file_dst_name;
			$uploader->clean();
			return $name;
		}
		return false;
	}

?>
