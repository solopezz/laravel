<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
		'name'
	];

	public function messages()
	{
		return $this->morphedByMany(Message::class, 'taggable');
	}
}
