<?php

namespace App\Http\Controllers;

use App\Events\MessageWasRecibe;
//Se implementa interfaze se define clase asociada a esta interfas en AppServiceProviders en boot
//asi si quiero cambiar o quitar el decorador y dejar el repositorio y tengo muchas intancias de esta clase es ir y cambiar cada uno, mejor hago referencia a a interfaz pero como una iterfas son solo reglas de los metos a usar en el AppServiceProviders se ligan la interfase y el decorador o la iterfase y el ropositorio pero solo seria una vez 
use App\Interfaces\MessagesInterface;
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
        return view('messages');
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
