<?php

namespace App\Models;

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
	//@override
	//Sebrescritura de metodos es un Accesor
	public function getRouteKeyName()
	{
		return 'url';
	}
}
