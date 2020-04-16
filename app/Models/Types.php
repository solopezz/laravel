<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public function users()
    {
    	//hasMany -> por que un typo puede tener muchos usaurios a un typo relacion 1 a muchos 
    	//si fuera de uno a uno se utlizaria aqui hasOne y no hasMany
        return $this->hasMany(User::class, 'type_id');
    }
}
