<?php
include_once 'header.php'; 
?>

<div class="jumbotron text-center">
    <h3>Создание новой статьи</h3>
</div>

<div class="container">
    <div class="alert alert-success" role="alert">Статья сохранена.</div>
    <div class="row">
        <div class="col-sm-12">
            <h4><?=$title;?></h4>
            <p><?=nl2br($text);?></p>
        </div>
    </div>
    <div class="row">
        <div class="ml-auto mr-3">
            <a class="btn btn-primary btn-lg" href="./?page=edit-article&id=<?=$id;?>" role="button">Редактировать статью</a>
        </div>
        <div class="mr-auto mr-3">
            <a class="btn btn-secondary btn-lg" href="./?page=delete-article&id=<?=$id;?>" role="button">Удалить статью</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>