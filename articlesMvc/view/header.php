<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Создаем MVC-блог</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./view/css/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?=isset($active_menu_item['home'])?'active':'';?>">
                    <a class="nav-link" href="./">Домой</a>
                </li>
                <li class="nav-item <?=isset($active_menu_item['blog'])?'active':'';?>">
                    <a class="nav-link" href="./?page=blog">Список статей</a>
                </li>
                <li class="nav-item <?=isset($active_menu_item['createArticle'])?'active':'';?>">
                    <a class="nav-link" href="./?page=create-article">Создать статью</a>
                </li>
                <li class="nav-item <?=isset($active_menu_item['aboutUs'])?'active':'';?>">
                    <a class="nav-link" href="./?page=about-us">О нас</a>
                </li>
            </ul>
        </div>
    </nav>