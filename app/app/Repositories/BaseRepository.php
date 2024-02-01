<?php

namespace App\Repositories;

use App\Repositories\Interface\InterfaceRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements InterfaceRepository
{

    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function paginate(){
        return $this->model->paginate(2);
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function create(array $data){
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->model->find($id);

        if (!$record) {
            return false;
        }

        return $record->update($data);
    }

    public function delete($id){
        $record = $this->model->find($id);
        return $record->delete();
    }
}