<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model {
    use HasFactory;
    
    protected $table = 'serie';
    
    protected $fillable = ['title', 'year', 'seasons', 'duracion', 'protagonista', 'genero'];

    public $timestamps = false;

}
