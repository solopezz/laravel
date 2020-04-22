<?php 
//El usuo de los repositories es para la logica o conexiones la base de datos para qe el controlador este mas pequeño
namespace App\Repo;
use App\Interfaces\MessagesInterface;
use App\Models\Message;

class SendMailClient implements MessagesInterface
{
	
	public function show()
	{
        //si se ocupa alguna relacion simpre poner el with optimizar consulta
        return Message::with(['users','note','tags'])
        ->orderBy('created_at','DESC')
        ->paginate(10);
    }

    public function send($request)
    {
        $msj = Message::create($request);
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
            $msj->name = auth()->user()->name;
            $msj->email = auth()->user()->email;

            // Message::create(array_merge(request()->all(), ['user_id' => auth()->user()->id]));
        }
        return $msj;
    }
}