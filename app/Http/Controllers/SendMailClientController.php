<?php

namespace App\Http\Controllers;

use App\Events\MessageWasRecibe;
use App\Interfaces\MessagesInterface;
use App\Models\User;
use Illuminate\Http\Request;

class SendMailClientController extends Controller
{
    protected $messages;

    public function __construct(MessagesInterface $messages)
    {
        $this->messages = $messages;
    }

    public function show()
    {
        //usa el decorador CacheMessages y depues se hace referencia al report
        $messages = $this->messages->show();

        return view('msj', ['messages' => $messages]);
    }

    public function view()
    {
        $users = auth()->user() ? User::where('id','!=', auth()->user()->id)->get() : User::all();
        return view('messages', ['users' => $users]);
    }

    public function send(Request $request)
    {
        //Esto puede ir en un from request
        $validatedData = $request->validate([
            'msj' => 'required',
        ]);
        
        //usa el decorador CacheMessages y depues se hace referencia al report
        $msj = $this->messages->send(request()->all());
        //Se ajecuta el evento y a la espera esta el listener que es el que envia el correo con el mensaje
        event(new MessageWasRecibe($msj->getAttributes()));
        

    	//return email to vist
    	//return new MessageSend($args);
    	//Mensaje de sesion
        return back()->with('status', "Recibimos tu mensaje gracias");
    }
}
