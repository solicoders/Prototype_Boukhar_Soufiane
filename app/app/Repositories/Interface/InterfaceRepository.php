<?php

namespace App\Repositories\Interface;


interface InterfaceRepository {

    public function paginate();

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);
    
    public function delete($id);

}