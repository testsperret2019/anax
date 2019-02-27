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
