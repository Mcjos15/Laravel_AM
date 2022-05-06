<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementos extends Model
{
    use HasFactory;
    protected $table = "elementos";
    protected $primarykey = "idElemento";

    protected $fillable = ['nombre', 'peso','simbolo', ];
}
