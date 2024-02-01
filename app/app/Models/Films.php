<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;

    public $table = 'films';
    protected $fillable = ['titre','description','reference','categorie_id'];

    public function category(){
        return $this->belongsTo('categories');
    }

}
