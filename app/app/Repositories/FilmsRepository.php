<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Films;
use App\Models\Categories;

class FilmsRepository extends BaseRepository
{
    public function __construct(Films $films){
        parent::__construct($films);
    }

    public function create(array $data){
        $now = \Carbon\Carbon::now();
        if(isset($data)){
            $data['reference'] = $data['titre'].'_'.$now;
        }
        parent::create($data);
    }

    public function findCategorie(){
        return Categories::all();
    }

    public function find($id){
        return Films::join('categories','films.categorie_id','=','categories.id')->where('films.id','=', $id)->first();
    }

    public function searchFilm($search){
       return Films::where(function ($query) use ($search) {
            $query->where('titre', 'like', '%' . $search . '%')
                ->orWhere('description','like','%'. $search . '%');
        })
        ->paginate(3);
    }
}