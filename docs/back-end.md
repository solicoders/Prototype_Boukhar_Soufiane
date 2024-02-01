# Lignes de commande utilisées

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