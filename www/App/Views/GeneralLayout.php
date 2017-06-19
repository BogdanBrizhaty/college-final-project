<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<?php extract($data); ?>
		<title><?php echo $title; ?></title>
		<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/resources/js/jquery-1.6.2.js"></script>
		<style>
		* {
			margin:0;
			padding:0;
		}
			html, body {
				width:100%;
				height:100%;
				min-width:1280px;
			}
			a {
				text-decoration:none;
			}
			header {
				background-color:#007AFF; 
				height:50px;
			}
			footer {
				min-height:150px;
				background-color:#242424;
			}
			footer a, span {
				color:#EAEDEF;
				font-family:Tahoma;
				font-size:11pt;	
				text-decoration:none;
			}
			body {
				background-color:#E1E5E8;
			}
			strong {	
				font-weight:700;
			}
			.navigation_link, .user_menu_header, #cat_menu_header {
				margin-top:1px;
				box-sizing: border-box;
				text-decoration:none;
				cursor:pointer;
				float: left;
				display: block;
				font-family:Tahoma;
				color:#424242;
				padding: .8em .75em;
				width: 95%;
				background-color:white;
				overflow:hidden;
				font-size:11pt;
			}
			.navigation_link:hover {
				color:#007AFF;
			}
			.user_menu_header, #cat_menu_header {
				margin-top:15px;
				display: block;
				background-color:#F8F8F8; 
				cursor:default;
				text-align:center;
			}
			.user_menu_header{
				
				width:70%;
				margin-left:5%; 
			}
			.header_navigation_button, .header_navigation_button_active {
				cursor:pointer; 
				text-decoration:none; 
				height:50px; 
				padding-left:8px; 
				padding-right:8px; 
				font-size:11pt; 
				font-family:Tahoma; 
				color:white;  
				float:left; 
				display:inline-block;
				background-color:#007AFF; 				
			}
			.header_navigation_button:hover {
				background-color:#1987FF;
			}
			.header_navigation_button_active {
				background-color:#F3B50E;
				cursor:default;
			}
			.header_navigation_span_container {
				position:relative; 
				top:15px;
			}
			#MainMenu {
				margin-left:20%;
			}
			.white_button, .green_button, .blue_button, .purple_button, .yellow_button, .act_btn {
				padding:10px;
				min-height:30px;
				cursor:pointer;
				outline:none; 
				text-decoration:none;
				border:none;
				background-color:transparent;
				color:#424242;
				border-radius:1px;
				font-size:10pt;
			}
			.green_button, .blue_button, .purple_button,.yellow_button, .act_btn {
				color:white;
			}
			.green_button, .act_btn {
				background-color:#76CD29;
			}
			.green_button:hover {
				background-color:#90DC4E;
			}
			.blue_button {
				background-color:#007AFF; 	
			}
			.blue_button:hover {
				background-color:#1987FF;
			}
			.yellow_button {
				background-color:#F3B50E; 	
			}
			.yellow_button:hover {
				background-color:#F4BC26;
			}
			
			.green_block {
				border-left:2px solid #76CD29;
			}
			.blue_block {
				border-left:2px solid #007AFF;
			}
			.yellow_block {
				border-left:2px solid #F3B50E;
			}
			.post_title, .post_footer {
				padding:11px; 
				background-color:#F8F8F8;
				font-family:tahoma; 
				font-size:11pt;
				color:#424242;
			}
			.post_footer {
				background-color:#EAEDEF;
				
			}
			.post_body {
				padding:10px; 
				margin-top:1px; 
				padding-top:10px; 
				background-color:white;
				font-family:tahoma; 
				color:#424242;
				text-align:justify;
				font-size:11pt;
			}
			.form_left_col {
				display:inline-block; width:10%;
			}
			.form_right_col {
				display:inline-block; width:90%;
				float:right;
			}
			input[type="text"],input[type="email"], textarea {
				padding:2px;
				outline:none;
			}
			input[type="text"]:focus, input[type="email"]:focus, textarea:focus {
				outline:none;
				border:2px solid #F3B50E;
			}
			
		</style>
	</head>
	<body style="height:100%;">
		<?php include 'header.php'; ?>
		<div style="min-height:71%; ">
			<div id="rightcol" style="width:80%; display:inline-block;height:100%;">
				<div id="white_space" style="width:20%; display:inline-block; ">
					<?php include 'CategoryMenu.php'; ?>
				</div>
				<div id="content_area" style="width:80%; float:right;margin-top:15px;  display:inline-block; height:100%;">
					<?php include 'App/Views/'.$content_view; ?>
				</div>
			</div>
			<div id="leftcol" style="width:20%; display:inline-block; float:right; height:100%;">
				<?php include 'UserMenu.php'; ?>
			</div>
		</div>

		<?php include 'footer.php'; ?>
	</body>
</html>