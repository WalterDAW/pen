<?php

namespace pen;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'titulo', 'documento_tema','documento_tarea'];

}
