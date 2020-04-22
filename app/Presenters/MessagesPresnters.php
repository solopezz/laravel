<?php 

namespace App\Presenters;

class MessagesPresnters extends Presenter
{
	// private $messages;
	// //Se inyecta el modelo o objeto actual
	// public function __construct(Message $messages)
	// {
	// 	$this->messages = $messages;
	// }

	
	public function userName()
	{
		//$this->model -> construcor de la calse extendida Presenter
		if ($this->model->user_id) {
			return $this->model->users->name;
		}
		return $this->model->name;
	}

	public function userEmail()
	{
		if ($this->model->user_id) {
			return $this->model->users->email;
		}
		return $this->model->email;
	}

	public function userNote()
	{
		return $this->model->note ? $this->model->note->body : '';
	}

}
