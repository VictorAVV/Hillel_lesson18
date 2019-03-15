<?php
include 'header.php'; 
?>

<div class="jumbotron text-center">
    <h3>Редактирование статьи</h3>
</div>

<div class="container">
    <form action="./?page=save-article" method="POST">
        <input type="hidden" name="id" value="<?=$id;?>">
        <div class="form-group">
            <label for="titleArticle">Название статьи:</label>
            <input type="input" class="form-control" id="titleArticle" name="titleArticle" 
                aria-describedby="titleArticle" placeholder="Enter title of article" value="<?=$title;?>">
        </div>
        <div class="form-group">
            <label for="textArticle">Текст статьи:</label>
            <textarea class="form-control" id="textArticle" name="textArticle" rows="10"><?=$text;?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a class="btn btn-secondary ml-3" href="./?page=article&id=<?=$id;?>" role="button">Отмена</a>
    </form>
</div>

<?php include 'footer.php'; ?>