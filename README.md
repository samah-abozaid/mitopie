# Mitopie — Site web de la Ferme Bio

Site vitrine et de gestion pour la ferme **Mitopie**, productrice de légumes biologiques, œufs et viandes à Brecé (Mayenne, 53).

---

## Fonctionnalités

- **Catalogue produits** — affichage par catégorie avec disponibilité et saison
- **Système de réservation** — formulaire client avec envoi d'email de confirmation
- **Formulaire de contact** — envoi d'email via Gmail SMTP (PHPMailer)
- **Espace administration** — gestion des produits, catégories et réservations
- **Design responsive** — adapté mobile et desktop

---

## Stack technique

| Technologie | Usage |
|---|---|
| PHP 8 | Backend (MVC maison) |
| MySQL | Base de données |
| PHPMailer | Envoi d'emails SMTP |
| HTML / CSS | Frontend (sans framework) |
| WAMP | Environnement de développement |

---

## Installation locale

### Prérequis
- WAMP / XAMPP (PHP 8+, MySQL)
- Composer

### Étapes

**1. Cloner le projet**
```bash
git clone https://github.com/samah-abozaid/mitopie.git
cd mitopie
```

**2. Installer les dépendances**
```bash
composer install
```

**3. Configurer la base de données**
```bash
cp config/database.example.php config/database.php
```
Remplis `config/database.php` avec tes identifiants MySQL, puis importe le schéma :
```sql
-- Dans phpMyAdmin ou MySQL CLI :
source src/mitopie_database.sql
```

**4. Configurer l'email**
```bash
cp config/mail.example.php config/mail.php
```
Remplis `config/mail.php` avec ton adresse Gmail et ton [App Password](https://myaccount.google.com/apppasswords).

**5. Vérifier le BASE_URL**

Dans `index.php`, vérifie que `BASE_URL` correspond à ton environnement :
```php
define('BASE_URL', '/mitopie/');  // si le projet est dans /wamp64/www/mitopie/
```

**6. Accéder au site**

| Page | URL |
|---|---|
| Accueil | `http://localhost/mitopie/` |
| Réservation | `http://localhost/mitopie/?page=reservation` |
| Administration | `http://localhost/mitopie/?page=admin` |

---

## Structure du projet

```
mitopie/
├── app/
│   ├── controllers/       # Contrôleurs (Home, Admin, Contact, Reservation...)
│   ├── core/              # Router, Database, Mailer, helpers
│   ├── managers/          # Accès base de données
│   ├── models/            # Modèles de données
│   └── views/             # Vues PHP (layout, admin, pages...)
├── config/
│   ├── database.example.php
│   └── mail.example.php
├── public/
│   ├── css/style.css
│   ├── js/app.js
│   └── images/
├── src/
│   └── mitopie_database.sql
├── index.php              # Point d'entrée
└── composer.json
```

---

## Administration

Accède à l'espace admin via `?page=admin`.

Crée le premier compte administrateur avec le script :
```bash
php scripts/create_admin.php
```

### Fonctionnalités admin
- Gérer les produits (ajout, modification, suppression)
- Gérer les catégories
- Voir et traiter les réservations (confirmer, annuler, supprimer)
- Envoi automatique d'un email de confirmation au client lors de la validation

---

## Variables de configuration

### `config/database.php`
```php
return [
    'host'    => 'localhost',
    'dbname'  => 'mitopie',
    'user'    => 'root',
    'pass'    => '',
    'charset' => 'utf8mb4',
];
```

### `config/mail.php`
```php
return [
    'host'      => 'smtp.gmail.com',
    'port'      => 587,
    'username'  => 'votre@gmail.com',
    'password'  => 'app_password_gmail',
    'from'      => 'votre@gmail.com',
    'from_name' => 'Ferme Mitopie',
    'to'        => 'contact@mitopie.fr',
];
```

---

## Auteur

Développé par **Samah Abozaid**

---

*Ferme Mitopie · Le Moulin de Favières · 53120 Brecé*
