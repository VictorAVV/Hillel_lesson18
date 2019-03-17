<?php 
$active_menu_item = array('blog' => 1);
include 'header.php'; 
?>

<div class="jumbotron text-center">
	<h3>Список статей</h3>
</div>

<div class="container">
	<table class="table table-striped">
		<thead>
			<tr class="d-flex">
				<th class="col-10" scope="col"><a href="?page=blog&sortby=title&direction=asc">Статья <i class="fa fa-sort-desc"></i></a></th>
				<th class="col-2" scope="col"><a href="?page=blog&sortby=date&direction=asc">Дата <i class="fa fa-sort-asc"></i></a></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($articles as $article) { ?>
			<tr class="d-flex">
				<td class="col-10"><a href="?page=article&id=<?=$article['id'];?>"><?=$article['title']; ?></a></td>
				<td class="col-2"><?=$article['date']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include 'footer.php'; ?>