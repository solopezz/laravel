<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = [
		'body',
	];

	public function noteable()
	{	//belongsTo se encuntra en la tabla el id de referencia message_id esta en la tabla de mensajes
		return $this->morphTo();
	}
}
