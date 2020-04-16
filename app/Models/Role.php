<?php
//Al guardar en na relacion muchos a mucho se utilia attach y detacj sync para evitar valores duplicados
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
