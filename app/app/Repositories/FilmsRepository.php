<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Films;

class FilmsRepository extends BaseRepository
{
    public function __construct(Films $films){
        parent::__construct($films);
    }

    public function searchFilm($search){
       return Films::where(function ($query) use ($search) {
            $query->where('titre', 'like', '%' . $search . '%')
                ->orWhere('description','like','%'. $search . '%');
        })
        ->paginate(3);
    }
}