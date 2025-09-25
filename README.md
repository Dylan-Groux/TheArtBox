# 🎨 The ArtBox

![PHP version](https://img.shields.io/badge/PHP-7%2B-blue?logo=php)
![GitHub last commit](https://img.shields.io/github/last-commit/Dylan-Groux/TheArtBox)
![The Art Box](https://img.shields.io/badge/The%20Art%20Box-Projet%20PHP-orange?style=for-the-badge)

> **Projet PHP pour la galerie d'art The ArtBox**  
> Réalisé dans le cadre du parcours Développeur d’application Full-stack d'OpenClassrooms.

---

## 📁 Structure du projet

```
├── index.php
├── config.php
├── README.md
├── .gitignore
├── vendor/
│   └── [dépendances Composer]
├── assets/
│   ├── css/
│   │   └── style.css
│   └── img/
│       └── [images d'oeuvres et logo]
├── src/
│   ├── controller/
│   │   └── TraitementController.php
│   ├── model/
│   │   └── OeuvreData.php
│   ├── services/
│   │   ├── Database.php
│   │   ├── HandleSubmissionsManager.php
│   │   ├── OeuvreManager.php
│   │   └── ValidatorManager.php
│   └── templates/
│       ├── ajouter.php
│       ├── footer.php
│       ├── header.php
│       ├── home.php
│       └── oeuvre.php
```

---

## 🚀 Installation

1. **Cloner le dépôt**
    ```bash
    git clone https://github.com/Dylan-Groux/TheArtBox.git
    ```
2. **Placer le dossier** dans votre répertoire de projets PHP (`www`, `htdocs`, etc.).
3. **Installer les dépendances Composer**
    ```bash
    composer install
    ```
4. **Configurer votre base de données**
    - Renseignez vos chemin relatif dans `config.php` (non versionné).
5. **Lancer le serveur local** (WAMP, XAMPP, MAMP...).
6. **Accéder au projet** via [http://localhost/TheArtBox](http://localhost/TheArtBox) ou selon votre configuration.

---

## 🖼️ Fonctionnalités

- Affichage des œuvres d'art
- Ajout d'une œuvre
- Visualisation détaillée
- Structure MVC simplifiée
- Validation des formulaires
- Gestion centralisée des soumissions

---

## 🛠️ Technologies

- PHP natif (PSR, SOLID, Clean Code)
- HTML / CSS
- MySQL via phpMyAdmin
- Composer (autoload, dépendances)

---

## 📚 Branches

- `main` : code initial

---

## 🔒 Sécurité & bonnes pratiques

- `config.php` est ignoré par Git (`.gitignore`) pour protéger mes identifiants.

---

## 🔗 Liens utiles

- [OpenClassrooms - Parcours PHP/Symfony](https://openclassrooms.com/fr/paths/518-developpeur-dapplication-php-symfony)
- [Mon dépôt GitHub](https://github.com/Dylan-Groux/TheArtBox)
- [Dépôt original OpenClassrooms](https://github.com/OpenClassrooms-Student-Center/PHP-P4-exercice.git)
