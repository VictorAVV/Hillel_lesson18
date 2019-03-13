<?php

class RouteController
{
    public static function getRoute($page)
    {
        switch ($page) {
            case null:
            case 'index':
                $controllerName = CommonController::class;
                $method = 'index';
                break;
            case 'about-us':
                $controllerName = CommonController::class;
                $method = 'aboutUs';
                break;
            case 'blog':
                $controllerName = BlogController::class;
                $method = 'blog';
                break;
            case 'article':
                $controllerName = BlogController::class;
                $method = 'article';
                break;
            case 'create-article':
                $controllerName = BlogController::class;
                $method = 'createPage';
                break;
            case 'save-article':
                $controllerName = BlogController::class;
                $method = 'saveArticle';
                break;
            case 'delete-article':
                $controllerName = BlogController::class;
                $method = 'deleteArticle';
                break;
            case 'edit-article':
                $controllerName = BlogController::class;
                $method = 'editArticle';
                break;

            default:
                $controllerName = CommonController::class;
                $method = 'pageNotFound';
                break;
        }
        
        $controller = new $controllerName();
        $controller->$method();
    }
}