<?php

namespace App\Http\Controllers;

use App\Events\MessageWasRecibe;
use App\Repo\SendMailClient;
use Illuminate\Http\Request;

class SendMailClientController extends Controller
{
    public $messages;

    public function __construct(SendMailClient $messages)
    {
        $this->messages = $messages;
    }

    public function show()
    {
       //uso de repositories SendMailClient se instancia a esa clase en el constructor 
        $messages = $this->messages->show();

        return view('msj', ['messages' => $messages]);
    }

    public function view()
    {
        return view('messages');
    }

    public function send(Request $request)
    {
        //Esto puede ir en un from request
        $validatedData = $request->validate([
            'msj' => 'required',
        ]);
        
        //usa el repo SendMailClient
        $this->messages->send(request()->all());

        //Se ajecuta el evento y a la espera esta el listener que es el que envia el correo con el mensaje
        event(new MessageWasRecibe(request()->msj));
        

    	//return email to vist
    	//return new MessageSend($args);
    	//Mensaje de sesion
        return back()->with('status', "Recibimos tu mensaje gracias");
    }
}
