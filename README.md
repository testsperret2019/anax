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
1- Ajouter et configurer lexikBundle au projet pour authentifier les utlisateurs en API REST.
2- Créer le controller Api/Interest + tests fonctionnels.
3- Ajouter aux services symfony la gestion du changement de statut en fonction de la somme des intérets.
4- Valider les paramètres d'appels des API.
5- Gérer les cas d'erreur de l'API.
6- Bonus : créer la commande symfony pour envoyer le mail aux investisseurs d'un projet.
7- Faire une installation from scratch et compléter le README.md #Installation
8- Baser les tests fonctionnels CRUD de l'entité projet sur des fixtures.
9- Monter la couverture de code à 100% sur Controller et Services.
