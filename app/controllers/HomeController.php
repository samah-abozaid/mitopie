<?php
namespace controllers;

use managers\CategoryManager;
use managers\ProductManager;

class HomeController
{
    public function index(): void
    {
        $categoryManager = new CategoryManager();
        $productManager  = new ProductManager();

        render('home/index', [
            'title'      => 'Accueil — Mitopie, ferme bio à Brecé',
            'activePage' => 'accueil',
            'categories' => $categoryManager->getAll(),
            'products'   => $productManager->getFeatured(4),
        ]);
    }
}
