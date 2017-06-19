	<div class="post_body">
		<form action="" enctype="multipart/form-data" method="post">
			<div>
				<div class="form_left_col">
					Файл
				</div>
				<div class="form_right_col">
					<input type="file" style="width:50%;" name="FileName" required/>
				</div>
			</div>
			<br/>
			<div>
				<div class="form_left_col">
					Описание
				</div>
				<div class="form_right_col">
					<input type="text" style="width:50%;"  name="Description" required/>
				</div>
			</div>
			<br/>
			<div>
				<input type="submit" value="Добавить" class="green_button"/>
				<a href="/gallery/list" title="Отмена" >
					<input type="button" value="Отмена" class="white_button" />
				</a>
			</div>
		</form>
			
	</div>