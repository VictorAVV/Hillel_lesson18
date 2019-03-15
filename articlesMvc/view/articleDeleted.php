<?php
include_once 'header.php'; 
?>

<div class="jumbotron text-center">
    <h3>Удаление статьи</h3>
</div>
<div class="container">
    <div class="alert alert-success" role="alert">Статья "<?=$title;?>" удалена.</div>
</div>
<div class="row">
    <div class="ml-auto mr-auto mr-3">
        <a class="btn btn-secondary btn-lg" href="./?page=blog" role="button">Вернуться к списку статей</a>
    </div>
</div>

<?php include 'footer.php'; ?>