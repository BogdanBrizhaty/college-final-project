	<div class="post_body">
		<form action="" method="post">
			<div>
				<div class="form_left_col">
					Название
				</div>
				<div class="form_right_col">
					<input type="text" style="width:50%;"  value="<?php echo $cat->Name; ?>" name="Name" required/>
				</div>
			</div>
			<br/>
			<div>
				<input type="submit" value="Отправить" class="green_button"/>
				<a href="/categories" title="Отмена" >
					<input type="button" value="Отмена" class="white_button" />
				</a>
			</div>
		</form>
			
	</div>