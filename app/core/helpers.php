<?php

/**
 * Render a view file, extracting $data as local variables.
 * Usage: render('home/index', ['title' => '...', 'products' => [...]])
 */
function render(string $view, array $data = []): void
{
    extract($data, EXTR_SKIP);
    require APP . '/views/' . $view . '.php';
}

/** Escape HTML output safely */
function h(?string $str): string
{
    return htmlspecialchars((string) $str, ENT_QUOTES, 'UTF-8');
}

/**
 * Build an internal URL.
 * url()                    → index.php
 * url('produits')          → index.php?page=produits
 * url('admin', 'login')    → index.php?page=admin&action=login
 */
function url(string $page = '', string $action = '', array $params = []): string
{
    $q = [];
    if ($page)   $q['page']   = $page;
    if ($action) $q['action'] = $action;
    $q = array_merge($q, $params);
    return BASE_URL . 'index.php' . ($q ? '?' . http_build_query($q) : '');
}

/** Redirect to an internal URL and stop execution */
function redirect(string $page = '', string $action = '', array $params = []): void
{
    header('Location: ' . url($page, $action, $params));
    exit;
}

/** Check if the admin is logged in; redirect to login if not */
function requireAdmin(): void
{
    if (empty($_SESSION['admin_id'])) {
        redirect('admin', 'login');
    }
}
