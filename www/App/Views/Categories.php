	<div class="post_body">
			<a href="/categories/add" title="Добавить" >
				<input type="button" value="Добавить новую" class="blue_button" />
			</a>
	</div>
<div class="post_body">
<?php
	foreach ($cats as $cat)
	{
		echo '
		<div style="padding:10px;">
			<span style="">
				'.$cat->Name.'
			</span>
			<div style="float:right; position:relative; top:0;">
				<a style="font-size:10pt;" href="/categories/delete?id='.$cat->Id.'" title="Удалить">Удалить</a>&nbsp;
				<a style="font-size:10pt;" href="/categories/edit?id='.$cat->Id.'" title="Редактировать">Редактировать</a>
			</div>
		</div>';
	}
?>
</div>