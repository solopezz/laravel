<?php 
//El usuo de los repositories es para la logica o conexiones la base de datos para qe el controlador este mas pequeño
namespace App\Repo;
use App\Models\Message;
use Illuminate\Support\Facades\Cache;

class SendMailClient
{
	
	public function show()
	{
		$key = "messages.page" . request('page',1);
        /*
        Cache si la llave no se encuentra en cache se ejecuta el closure y se gurda en cache
        el tag es para hacer unico ese valor y al moemnto de limpiar con flush no elmiminar 
        todos los valores de cache    
        */
        //Cache no se hace la consulta la BD se almacena en cache
        return Cache::tags('messages')->rememberForever ($key, function () {
        //si se ocupa alguna relacion simpre poner el with optimizar consulta
        	return Message::with(['users','note','tags'])
        	->orderBy('created_at','DESC')
        	->paginate(10);
        });
    }

    public function send($request)
    {
    	 //Se elimimina el cache del key messages osea la lista de mnesajes la elimina para volver a cargar el regustro nuevo
    	Cache::tags('messages')->flush();

    	$msj =Message::create($request);
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
    }
}