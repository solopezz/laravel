<?php 

namespace App\Interfaces;

interface MessagesInterface {

	public function show();

	public function send($req);

}