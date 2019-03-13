<?php 
$active_menu_item = array('blog' => 1);
include 'header.php'; 
?>

<div class="jumbotron text-center">
    <h3>Список статей</h3>
</div>

<div class="container">
	<ul>
		<?php foreach ($articles as $article) { ?>
		<li><a href="?page=article&id=<?=$article['id'];?>"><?=$article['title'] ?></li>
		<?php } ?>
	</ul>
</div>

<?php include 'footer.php'; ?>