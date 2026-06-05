-- ============================================================
-- BASE DE DONNÉES MITOPIE
-- Ferme Mitopie, Brecé (53)
-- ============================================================

CREATE DATABASE IF NOT EXISTS mitopie
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE mitopie;

-- ------------------------------------------------------------
-- TABLE : categories
-- ------------------------------------------------------------
CREATE TABLE categories (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nom         VARCHAR(50)  NOT NULL,
    icone       VARCHAR(10)  NOT NULL DEFAULT '🌿',
    description TEXT,
    ordre       INT          DEFAULT 0,
    created_at  DATETIME     DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- TABLE : products
-- ------------------------------------------------------------
CREATE TABLE products (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    nom          VARCHAR(100)  NOT NULL,
    description  TEXT,
    prix         DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    unite        VARCHAR(30)   DEFAULT 'pièce',
    categorie_id INT           NOT NULL,
    image        VARCHAR(255)  DEFAULT 'default.jpg',
    saison       ENUM(
                   'Printemps','Été','Automne','Hiver','Toute saison'
                 ) DEFAULT 'Toute saison',
    disponibilite ENUM(
                   'disponible','sur_commande','indisponible'
                 ) DEFAULT 'disponible',
    visible      TINYINT(1)    DEFAULT 1,
    created_at   DATETIME      DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME      DEFAULT CURRENT_TIMESTAMP
                               ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- TABLE : users  (admin seulement)
-- ------------------------------------------------------------
CREATE TABLE users (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    nom          VARCHAR(100) NOT NULL,
    email        VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role         ENUM('admin') DEFAULT 'admin',
    created_at   DATETIME     DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- DONNÉES DE TEST (données fictives pour commencer)
-- ============================================================

-- Catégories
INSERT INTO categories (nom, icone, description, ordre) VALUES
('Légumes',       '🥕', 'Légumes et fruits du jardin, cultivés en bio sans pesticides.', 1),
('Poules & Œufs', '🐔', 'Œufs colorés et poules de races élevées en plein air.',        2),
('Animaux',       '🐑', 'Agneaux en caissette, saucisses et merguez faits à la ferme.', 3);

-- Produits
INSERT INTO products
  (nom, description, prix, unite, categorie_id, image, saison, disponibilite, visible)
VALUES
-- Légumes (categorie_id = 1)
('Salade verte',    'Salade fraîche du jardin, bio.',         1.50, 'pièce',   1, 'salade.jpg',   'Été',          'disponible',     1),
('Tomates variées', 'Tomates de différentes variétés, bio.',  2.80, 'kg',      1, 'tomates.jpg',  'Été',          'disponible',     1),
('Courgettes',      'Courgettes bio récoltées à la main.',    1.80, 'kg',      1, 'courgette.jpg','Été',          'disponible',     1),
('Carottes',        'Botte de carottes bio, sucrées.',        1.50, 'botte',   1, 'carotte.jpg',  'Automne',      'indisponible',   1),
('Haricots verts',  'Haricots extra-fins bio.',               3.00, 'kg',      1, 'haricots.jpg', 'Été',          'disponible',     1),
('Pommes de terre', 'Variété Charlotte, bio.',                1.20, 'kg',      1, 'patate.jpg',   'Automne',      'indisponible',   1),

-- Poules & Œufs (categorie_id = 2)
('Œufs colorés',   'Boîte de 6 œufs colorés, poules plein air.', 3.50, 'boîte de 6', 2, 'oeufs.jpg',   'Toute saison', 'disponible',     1),
('Poule de race',  'Poule de race patrimoniale.',                  0.00, 'pièce',      2, 'poule.jpg',   'Variable',     'sur_commande',   1),

-- Animaux (categorie_id = 3)
('Agneau caissette', 'Agneau entier en caissette, élevage bio ~8kg.', 18.00, 'kg',   3, 'agneau.jpg',    'Printemps',    'sur_commande',   1),
('Saucisses agneau', 'Saucisses d\'agneau faites à la ferme, 500g.',   8.00, 'sachet', 3, 'saucisses.jpg', 'Toute saison', 'disponible',     1),
('Merguez agneau',   'Merguez épicées d\'agneau, 500g.',               8.00, 'sachet', 3, 'merguez.jpg',   'Toute saison', 'disponible',     1);

-- Compte admin (mot de passe : admin123 — à changer en production !)
-- Le vrai mot de passe hashé sera généré par PHP avec password_hash()
-- Ceci est juste un placeholder pour les tests
INSERT INTO users (nom, email, password_hash, role) VALUES
('Aurore Mengual', 'aurore@mitopie.fr',
 '$2y$12$placeholder_change_this_with_php_password_hash',
 'admin');

-- ============================================================
-- VÉRIFICATION : afficher les tables créées
-- ============================================================
SELECT 'categories' AS table_name, COUNT(*) AS nb_lignes FROM categories
UNION ALL
SELECT 'products',  COUNT(*) FROM products
UNION ALL
SELECT 'users',     COUNT(*) FROM users;
