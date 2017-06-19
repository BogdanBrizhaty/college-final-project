<?php

	require_once('DAL/PhotoRepository.php');
	class GalleryModel extends BaseModel
	{
		
		function __construct()
		{
			parent::__construct(new PhotoRepository());
		}
		
		function GetPhotos()
		{
			return $this->Repository->Get(0,0);
		}
		
		public function UploadImage($file)
		{
			$this->uploader = new upload($file);
			if ($this->uploader->uploaded)
			{
				$this->uploader->file_new_name_body = "img";
				$this->uploader->process('uploads/gallery/');
			}
			if ($this->uploader->processed)
			{
				$name = $this->uploader->file_dst_name;
				$this->uploader->clean();
				return $name;
			}
			return false;
		}
		function Add($post, $file)
		{
			$fname = $this->UploadImage($file);
			$ph = new Photo(0, $fname, $post['Description']);
			$this->Repository->Add($ph);
		}
		
		function GetItemsCount()
		{
			
		}
		function Delete($pid)
		{
			$id = intval($pid);
			$this->Repository->Delete($id);
		}
	}

?>
