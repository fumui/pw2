<?php

namespace Controller;

use Model\CategoryModel;
use Model\BookModel;
use View\View;

class HomeController
{
    public function index()
    {
        // Fetch categories
        $categories = CategoryModel::findAll();

        // Fetch books
        $books = BookModel::findAll();

        // Render the view
        $view = new View();
        $view->render('home.php', [
            'categories' => $categories,
            'books' => $books,
        ]);
    }
}
