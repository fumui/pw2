<?php

namespace Controller;

use Model\CategoryModel;
use Model\BookModel;
use View\View;

class HomeController
{
    public function index()
    {
        // Start the session
        session_start();

        // Fetch categories
        $categories = CategoryModel::findAll();
        $errMsg = null;
        $errCodes = include 'config/error_codes.php';
        if (isset($_GET['errCode'])){
            $errMsg = $errCodes[$_GET['errCode']] ?? null;
        }
        // Fetch books
        $books = BookModel::findAll();

        // Render the view
        $view = new View();
        $config = include 'config/settings.php';
        $view->render('home.php', [
            'categories' => $categories,
            'books' => $books,
            'user' => $_SESSION['user'] ?? null,
            'config' => $config,
            'errMsg' => $errMsg,
        ]);
    }
}
