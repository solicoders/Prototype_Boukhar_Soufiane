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
        $yesterday = \Carbon\Carbon::now()->subDays(1);
        if(isset($data)){
            $data['reference'] = $data['titre'].'_'.$now;
            $data['created_at'] = $yesterday;
        }
        parent::create($data);
    }

    public function update($id, array $data){
        $yesterday = \Carbon\Carbon::now()->subDays(1);

        if(isset($data)){
            $data['updated_at'] = $yesterday;
        }
        parent::update($id, $data);
    }

    public function paginate(){
        return  Films::join('categories','films.categorie_id','=','categories.id')->paginate(3);
    }

    public function findCategorie(){
        return Categories::all();
    }

    public function find($id){
        return Films::join('categories','films.categorie_id','=','categories.id')->where('films.id','=', $id)->first();
    }

    public function searchFilm($search){
        return Films::join('categories','films.categorie_id','=','categories.id')->where('titre', 'like', '%' . $search . '%')
        ->orWhere('description','like','%'. $search . '%')->orWhere('genre','like','%'. $search . '%')->paginate(3);
    }
}