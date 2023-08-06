# Résultats en ligne du baccalauréat - Année 2023
Ce projet est conçu pour fournir un système en ligne permettant de consulter les résultats du baccalauréat pour l'année 2023 à l'Université de Mahajanga. Il offre une interface conviviale et facile à utiliser pour les étudiants, les parents et les membres du corps professoral.

## Fonctionnalités
- Consultation des résultats du baccalauréat par numéro d'inscription.
- Affichage des résultats détaillés incluant les informations de candidat.
- Affichage les statistiques de réussite.

## Technologie utilisée
Ce projet est développé en utilisant le framework Laravel, qui offre une structure robuste pour la création d'applications web modernes. Les principales technologies utilisées incluent :

- Laravel Framework : Plate-forme PHP élégante et puissante pour la création d'applications web.
- MySQL : Base de données relationnelle utilisée pour stocker les résultats des étudiants.
- HTML/CSS : Permet de créer une interface utilisateur attrayante et responsive.
- JavaScript : Utilisé pour améliorer l'expérience utilisateur et ajouter des fonctionnalités dynamiques.

## Installation
1. Clonez ce dépôt sur votre machine locale en utilisant la commande suivante :
   ```
   git clone https://github.com/GasyCoder/bacc-umg-2023.git
   ```

2. Installez les dépendances requises en utilisant la commande `composer install`.

3. Dupliquez le fichier `.env.example` et renommez-le en `.env`. Configurez les informations de base de données et autres détails pertinents dans ce fichier.

4. Générez une clé d'application unique en utilisant la commande `php artisan key:generate`.

5. Exécutez les migrations pour créer la structure de base de données en utilisant la commande `php artisan migrate`.

6. Démarrez le serveur de développement avec la commande `php artisan serve`.

7. Rendez-vous dans votre navigateur et accédez à l'URL `http://localhost:8000` pour accéder à l'application.