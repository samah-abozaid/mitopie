<?php
namespace controllers;

use managers\CategoryManager;
use managers\ProductManager;

class ProductController
{
    public function index(): void
    {
        $categoryManager = new CategoryManager();
        $productManager  = new ProductManager();

        $categories = $categoryManager->getAll();

        // Group products by category for display
        $productsByCategory = [];
        foreach ($categories as $cat) {
            $productsByCategory[] = [
                'category' => $cat,
                'products' => $productManager->getByCategory($cat->id),
            ];
        }

        render('products/index', [
            'title'              => 'Nos produits — Mitopie',
            'activePage'         => 'produits',
            'productsByCategory' => $productsByCategory,
        ]);
    }
}
