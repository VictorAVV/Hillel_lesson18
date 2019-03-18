<?php 
$active_menu_item = array('blog' => 1);
include 'header.php';
include 'src/blogSort.php';
?>

<div class="jumbotron text-center">
	<h3>Список статей</h3>
</div>

<div class="container">
	<table class="table table-striped">
		<thead>
			<tr class="d-flex">
				<th class="col-10" scope="col">
					<a href="?page=blog&sortby=title&sortorder=<?=$titleAnotherOrder;?>">Статья <i class="fa fa-sort<?=$titleOrder;?>"></i></a>
				</th>
				<th class="col-2" scope="col">
					<a href="?page=blog&sortby=datetime&sortorder=<?=$datetimeAnotherOrder;?>">Дата <i class="fa fa-sort<?=$datetimeOrder;?>"></i></a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($articles as $article) { ?>
			<tr class="d-flex">
				<td class="col-10">
					<a href="?page=article&id=<?=$article['id'];?>"><?=$article['title']; ?></a>
				</td>
				<td class="col-2">
					<?=date(DATEFORMAT, $article['datetime']); ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include 'footer.php'; ?>
