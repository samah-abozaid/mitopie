<?php
namespace controllers;

use managers\UserManager;
use managers\ProductManager;
use managers\CategoryManager;

class AdminController
{
    // ── Auth ──────────────────────────────────────────────

    public function login(): void
    {
        if (!empty($_SESSION['admin_id'])) {
            redirect('admin', 'dashboard');
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email']    ?? '');
            $password = trim($_POST['password'] ?? '');

            $userManager = new UserManager();
            $user = $userManager->authenticate($email, $password);

            if ($user) {
                $_SESSION['admin_id']   = $user->id;
                $_SESSION['admin_nom']  = $user->nom;
                redirect('admin', 'dashboard');
            } else {
                $error = 'Email ou mot de passe incorrect.';
            }
        }

        render('admin/login', [
            'title' => 'Connexion — Administration Mitopie',
            'error' => $error,
        ]);
    }

    public function logout(): void
    {
        session_destroy();
        redirect('admin', 'login');
    }

    // ── Dashboard ─────────────────────────────────────────

    public function dashboard(): void
    {
        requireAdmin();

        $productManager  = new ProductManager();
        $categoryManager = new CategoryManager();

        render('admin/dashboard', [
            'title'        => 'Tableau de bord — Administration',
            'activePage'   => 'dashboard',
            'nbProduits'   => $productManager->count(),
            'nbCategories' => $categoryManager->count(),
        ]);
    }

    // ── Products CRUD ─────────────────────────────────────

    public function produits(): void
    {
        requireAdmin();

        $productManager  = new ProductManager();
        $categoryManager = new CategoryManager();

        render('admin/products/index', [
            'title'      => 'Produits — Administration',
            'activePage' => 'produits',
            'products'   => $productManager->getAll(),
            'categories' => $categoryManager->getAll(),
        ]);
    }

    public function createProduct(): void
    {
        requireAdmin();

        $categoryManager = new CategoryManager();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeProductPost();
            if (!$data['nom'] || !$data['prix'] || !$data['categorie_id']) {
                $error = 'Nom, prix et catégorie sont obligatoires.';
            } else {
                $productManager = new ProductManager();
                $productManager->insert($data);
                redirect('admin', 'produits');
            }
        }

        render('admin/products/create', [
            'title'      => 'Ajouter un produit — Administration',
            'activePage' => 'produits',
            'categories' => $categoryManager->getAll(),
            'error'      => $error,
        ]);
    }

    public function editProduct(): void
    {
        requireAdmin();

        $id = (int) ($_GET['id'] ?? 0);
        $productManager  = new ProductManager();
        $categoryManager = new CategoryManager();
        $product = $productManager->getById($id);

        if (!$product) {
            redirect('admin', 'produits');
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeProductPost();
            if (!$data['nom'] || !$data['prix'] || !$data['categorie_id']) {
                $error = 'Nom, prix et catégorie sont obligatoires.';
            } else {
                $productManager->update($id, $data);
                redirect('admin', 'produits');
            }
        }

        render('admin/products/edit', [
            'title'      => 'Modifier un produit — Administration',
            'activePage' => 'produits',
            'product'    => $product,
            'categories' => $categoryManager->getAll(),
            'error'      => $error,
        ]);
    }

    public function deleteProduct(): void
    {
        requireAdmin();

        $id = (int) ($_GET['id'] ?? 0);
        if ($id) {
            $productManager = new ProductManager();
            $productManager->delete($id);
        }
        redirect('admin', 'produits');
    }

    // ── Private helpers ───────────────────────────────────

    private function sanitizeProductPost(): array
    {
        return [
            'nom'          => trim($_POST['nom']          ?? ''),
            'description'  => trim($_POST['description']  ?? ''),
            'prix'         => (float) ($_POST['prix']     ?? 0),
            'unite'        => trim($_POST['unite']        ?? 'pièce'),
            'categorie_id' => (int)  ($_POST['categorie_id'] ?? 0),
            'image'        => trim($_POST['image']        ?? 'default.jpg'),
            'saison'       => trim($_POST['saison']       ?? 'Toute saison'),
            'disponibilite' => trim($_POST['disponibilite'] ?? 'disponible'),
            'visible'      => isset($_POST['visible']),
        ];
    }
}
