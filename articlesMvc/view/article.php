<?php 
include 'header.php'; 
?>

<div class="jumbotron text-center">
    <h3>Статья</h3>
</div>

<div class="container">
    <h1><?=$article['title'];?></h1>
    <p><?=nl2br($article['text']);?></p>
    <div class="row">
        <div class="ml-auto mr-3">
            <a class="btn btn-primary btn-lg" href="./?page=edit-article&id=<?=$article['id'];?>" role="button">Редактировать статью</a>
        </div>
        <div class="mr-auto mr-3">
            <a class="btn btn-secondary btn-lg" href="./?page=delete-article&id=<?=$article['id'];?>" role="button">Удалить статью</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>