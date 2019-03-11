Anaxago symfony-starter-kit
===================

# Description

Ce projet est test avec :
- Symfony 3.4 minimum
- php 7.1 minimum


# Installation
- ```composer install```
- ```composer init-db ```

- Déclarer dans le virtualHost Apache la variable SYMFONY_ENV avec la valeur dev
  <VirtualHost *:80>
      ...
      <Directory " ...">
          SetEnv SYMFONY_ENV dev
      </Directory>
  </VirtualHost>



# TODO list
- Ajouter et configurer lexikBundle au projet pour authentifier les utlisateurs en API REST.
- Créer le controller Api/Interest + tests fonctionnels.
- Ajouter aux services symfony la gestion du changement de statut en fonction de la somme des intérets.
- Valider les paramètres d'appels des API.
- Gérer les cas d'erreur de l'API.
- Bonus : créer la commande symfony pour envoyer le mail aux investisseurs d'un projet.
- Faire une installation from scratch et compléter le README.md #Installation

- Baser les tests fonctionnels CRUD de l'entité projet sur des fixtures.
- Monter la couverture de code à 100% sur Controller et Services.
