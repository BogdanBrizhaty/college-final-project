<div id="msgbox">
<?php
	if (isset($_SESSION['msg']))
	{
		echo $_SESSION['msg']->Title.'<br/>';
		echo $_SESSION['msg']->Message.'<br/>';
		unset($_SESSION['msg']);
	}
?>
</div>
<header style="">
	
	<?php include 'HeaderMenu.php'; ?>

</header>