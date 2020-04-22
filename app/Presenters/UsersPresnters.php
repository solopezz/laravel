<?php 

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class UsersPresnters extends Presenter
{
	
	public function userRole()
	{
		foreach ($this->model->roles as $role) {
			echo ($role->name)."<br>";
		}
	}

	public function userLink()
	{
		return new HtmlString("<a  class='mr-2' href=". route('users.edit', $this->model->id). ">Editar</a>");
	}

	
}
