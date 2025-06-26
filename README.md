# 🏥 Plateforme de rendez-vous médicaux - Laravel

Ce projet est une application web de gestion de rendez-vous médicaux.

## 🎯 Objectif

-   Les **patients** peuvent s’inscrire, se connecter, prendre rendez-vous et consulter leur historique médical.
-   Les **médecins** peuvent gérer leurs rendez-vous et consulter les dossiers patients.
-   L’**admin** peut gérer les médecins et les spécialités.

## ⚙️ Technologies utilisées

-   Laravel (PHP)
-   MySQL
-   Blade (pour l’interface)

## 🔧 Fonctionnalités en cours

-   Inscription/connexion (multi-rôle)
-   Espace patient, médecin, admin
-   Ajout de médecin par l’admin

## ▶️ Installation rapide

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
