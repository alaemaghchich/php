# 🧑‍🍳 Gestion de Recettesv2 (CRUD + Relations)

---

## 🎯 Objectifs pédagogiques

Ce projet permet de travailler :

- 🔗 Les relations entre tables (JOIN)
- 🧱 La structuration avancée d’un projet PHP
- 🔄 Le CRUD complet (Create, Read, Update, Delete)
- 🔐 Sécurité (requêtes préparées)

---

# 🗄️ Base de données

## 📌 Tables

```sql
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    prep_time INT NOT NULL,
    image VARCHAR(255),
    category_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    edited_at DATETIME NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE ingredients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT,
    name VARCHAR(255),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id)
);
```

# 🚀 Fonctionnalités attendues

## 📖 1. Affichage des recettes (READ)

Afficher les recettes sous forme d'un tableau dans la page **read.php** avec :
- nom
- image
- catégorie (via JOIN)
- temps de préparation
- boutons pour modification et suppression (update & delete)

## ➕ 2. Ajouter une recette (CREATE)

Via un formulaire dans la page **create.php** contenant :
- nom
- temps de préparation
- image
- catégorie (select dynamique)

À faire :
- validation des champs
- insertion en base de données

## ✏️ 3. Modifier une recette (UPDATE)
- Le clic sur le bouton "Modifier" dans la page **read.php** redirige l'utilisateur à la page **update.php** en récupérant l'ID de la recette.
- La page **update.php** contient un formulaire pré-rempli
- La soumission du formulaire modifier les données de la recette en question dans la base de données

## ❌ 4. Supprimer une recette (DELETE)
- Le clic sur le bouton "Supprimer" dans la page **read.php** redirige l'utilisateur à la page **delete.php** en récupérant l'ID de la recette.
- Supprimer une recette via son ID
- Possibilité d’ajouter confirmation JS


# 🧩 Organisation du projet
```
/recettes-app-v2
  db.php
  functions.php
  index.php
  /crud
    read.php
    create.php
    update.php
    delete.php
  /images
  /css
    style.css
```