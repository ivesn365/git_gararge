# IHS-GARAGE

## 📋 Description

IHS-GARAGE est une application web de gestion d'atelier automobile/garage. Elle permet de gérer les utilisateurs, les véhicules, les cours, les planifications et les rapports d'inspection.

## ✨ Fonctionnalités principales

- **Gestion des utilisateurs** : Création, modification, suppression d'utilisateurs avec différents rôles
- **Gestion des véhicules** : Enregistrement et suivi des véhicules de l'atelier
- **Planification** : Gestion du planning des courses et des tâches
- **Rapports** : Génération de rapports au format PDF
- **Inspections** : Suivi des inspections des véhicules
- **Pannes** : Documentation des pannes et réparations
- **Dashboard** : Tableau de bord pour les administrateurs
- **Authentification** : Système de connexion sécurisé avec gestion des sessions

## 🏗️ Architecture

### Structure du projet

```
/sysControlleur/     - Contrôleurs (logique métier)
/sysModel/          - Modèles et classes métier
/sysVues/           - Vues (templates PHP)
  - admin/          - Vues pour les administrateurs
  - CTRP/           - Vues pour le rôle CTRP
  - MTN/            - Vues pour le rôle MTN
/assets/            - Ressources statiques (CSS, JS, images)
/planing/           - Module de planification
/doc/               - Documentation FPDF
```

### Base de données

Le projet utilise les classes suivantes pour la gestion des données :

- `Users.php` - Gestion des utilisateurs
- `Vehicule.php` - Gestion des véhicules
- `Course.php` - Gestion des courses
- `Planing.php` - Gestion de la planification
- `Inspections.php` - Gestion des inspections
- `Panne.php` - Gestion des pannes
- `Garage.php` - Logique métier du garage
- `Connexion.php` - Gestion de la connexion à la base de données
- `Query.php` - Constructeur de requêtes SQL

## 🔐 Système de sécurité

- **Authentification** : Connexion obligatoire pour accéder à l'application
- **CSRF Protection** : Tokens CSRF pour prévenir les attaques cross-site
- **Gestion des rôles** : Trois rôles principaux (admin, CTRP, MTN)
- **Chiffrement** : Classe AES pour le chiffrement des données sensibles

## 💻 Technologies utilisées

- **Backend** : PHP 7+
- **Frontend** : HTML5, CSS3, JavaScript
- **Framework CSS** : Bootstrap 5.3.2
- **Librairie jQuery** : DataTables pour les tableaux interactifs
- **Génération PDF** : FPDF
- **UI Components** : SweetAlert2, Chart.js, FontAwesome, Select2

## 🚀 Installation

1. Placer le projet dans le répertoire web (`/opt/lampp/htdocs/garage` ou équivalent)
2. Configurer la connexion à la base de données dans `sysModel/Connexion.php`
3. S'assurer que les permissions sur les répertoires sont correctes
4. Accéder à l'application via `http://localhost/garage`

## 📝 Points d'entrée principaux

- `index.php` - Page d'accueil après authentification
- `login.php` - Page de connexion
- `clogin.php` - Traitement de la connexion
- `carte_travail.php` - Gestion des tâches
- `rapport.php` - Génération de rapports
- `rapportCourse.php` - Rapports des courses

## 📚 Fichiers de configuration

- `header.php` - Initialisation de la session et inclusion des fichiers nécessaires
- `fpdf.php` - Librairie FPDF pour la génération de PDF

## 🔄 Contrôleur principal

Le fichier `sysControlleur/Controleur.php` centralise la logique de traitement des requêtes.

## 📍 Vues utilisateur

### Admin
- Tableau de bord
- Gestion des utilisateurs
- Gestion des véhicules
- Historique

### CTRP
- Page d'accueil
- Gestion des courses

### MTN
- Accueil spécifique

## ⚙️ Maintenance

- Vérifier régulièrement les logs d'erreur (`error_log`)
- Mettre à jour les dépendances externes
- Sauvegarder la base de données régulièrement
- Monitorrer les permissions des fichiers

## 📄 Licence

Voir le fichier `license.txt` pour plus de détails.
