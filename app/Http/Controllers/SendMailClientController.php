<?php

namespace App\Http\Controllers;

use App\Events\MessageWasRecibe;
use App\Models\Message;
use Illuminate\Http\Request;

class SendMailClientController extends Controller
{

    public function show()
    {
        //si se ocupa alguna relacion simpre poner el with optimizar consulta
        $messages = Message::with(['users','note','tags'])->get();
        return view('msj', ['messages' => $messages]);
    }

    public function view()
    {
        return view('messages');
    }

    public function send(Request $request)
    {

        $validatedData = $request->validate([
            'msj' => 'required',
        ]);

        $msj = Message::create(request()->all());
        if (auth()->user()) {
            //Guardar por medio de relaciones analizar es importante
            //el metodo save -> asigna un mensaje ya guardado a una relacion ya creada tambiense puede usar create ejemplo
                    // $m = App\Models\Message::find(2)
                    // => App\Models\Message {#3127
                    //      id: 2,
                    //      name: "pedroo",
                    //      email: "solopez.isc@gmail.com",
                    //      msj: "ssss",
                    //      user_id: null,
                    //      created_at: "2020-04-13 23:42:11",
                    //      updated_at: "2020-04-13 23:42:11",
                    //    }
                    // >>> $m->note()->create(['body'=>'nota 2']);
            auth()->user()->messages()->save($msj);
            // Message::create(array_merge(request()->all(), ['user_id' => auth()->user()->id]));
        }
        $args = request()->msj;
    	
        //Se ajecuta el evento y a la espera esta el listener que es el que envia el correo con el mensaje
        event(new MessageWasRecibe($args));
        

    	//return email to vist
    	//return new MessageSend($args);
    	//Mensaje de sesion
        return back()->with('status', "Recibimos tu mensaje gracias");
    }
}
