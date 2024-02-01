<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Categories;

class CategorieRepository extends BaseRepository
{
    public function __construct(Categories $categories){
        parent::__construct($categories);
    }
}