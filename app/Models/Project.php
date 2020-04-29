<?php

namespace App\Models;

use App\Casts\Addres;
use App\Events\ProjectCreated;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	// protected $fillable = [
	// 	'title',
	// 	'url',
	// 	'description'
	// ];
	//Qiutar asignacion masiva 
	protected $guarded = [];
	//Laravel proporciona algunos casts por ejemplo para guardar booleanos arrays etc pero tu puedes crear uno Addres por ejemplo
	protected $casts = [
		// 'is_public' => 'boolean',
        'addres' => Addres::class,
    ];
	//@override
	//Sebrescritura de metodos es un Accesor
	public function getRouteKeyName()
	{
		return 'url';
	}

	//Aqui esta otra forma de correr un evento no necesariamente tiene que ser desde el controlador tambien puede ser desde un modelo hay mas opciones aparte de la de created por ejemplo hay destroy etc
	protected $dispatchesEvents = [
		'created' => ProjectCreated::class
	];
}
