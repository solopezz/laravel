<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = [
		'name', 'email', 'msj','user_id'
	];

	public function users()
	{	//belongsTo se encuntra en la tabla el id de referencia user_id esta en la tabla de mensajes
        return $this->belongsTo(User::class,'user_id');
	}

	public function note()
	{
        return $this->morphOne(Note::class, 'noteable');
	}

	public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
