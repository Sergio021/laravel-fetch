<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    protected $primaryKey='id_Usuario';
    protected $fillable = ['app','apm','nombre','telefono','fecha_nac','sexo','correo','password','type'];
}
