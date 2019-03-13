<?php
$active_menu_item = array('home' => 1);
include_once 'header.php'; 
?>

<div class="jumbotron text-center">
    <h1>MVC Blog</h1>
    <p>Блог с использованием MVC модели</p> 
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Возможности нашего блога:</h3>
            <div>
                <ul>
                    <li>Вывод списка статей</li>
                    <li>Создание статей</li>
                    <li>Редактирование статей</li>
                    <li>Удаление статей</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>