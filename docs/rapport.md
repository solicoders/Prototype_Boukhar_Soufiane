# Lignes de commande utilisées pour creation d'application

```bash
# cd app
composer create-project laravel/laravel .

# installation admin-lte using npm

npm install admin-lte@^3.2 --save

```

# MLD de base de donne

- Films (Id,Titre,description,reference,Date_de_creation,categorie_id)
- categorie (Id,genre)



# Lignes de commande utilisées pour les jeux de test

```bash
php artisan make:seeder CategorieTableSeeder
php artisan make:seeder FilmTableSeeder

```


# Lignes de commande utilisées por creer backend

```bash
# Create model and controller
php artisan make:model Films -c
php artisan make:model Categorie -c

# Create request
php artisan make:request CreateFilms

```
## shemas de repositories

- Repositories
  - Interface
    - InterfaceRepository.php
  - BaseRepository.php
  - FilmsRepository.php
  - CategoriesRepository.php


# Lignes de commande utilisées pour unit test

```bash
php artisan make:test FilmsTest
```

# Lignes de commande utilisées pour le front end

```bash
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
```



