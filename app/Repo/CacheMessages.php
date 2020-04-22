<?php 

namespace App\Repo;

use App\Interfaces\MessagesInterface;
use Illuminate\Support\Facades\Cache;

class CacheMessages implements MessagesInterface
{
	public $sendMailClient;

	public function __construct(SendMailClient $sendMailClient)
	{
		$this->sendMailClient = $sendMailClient;
	}

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
    		
    		//Se llama al report que es el que se encarga con consultas a la BD
    		//uso de repositories SendMailClient se instancia a esa clase en el constructor 
        	return $this->sendMailClient->show();
        });
    }    

    public function send($request)
    {
    	 //Se elimimina el cache del key messages osea la lista de mnesajes la elimina para volver a cargar el regustro nuevo
    	Cache::tags('messages')->flush();

    	//Se llama al report que es el que se encarga con consultas a la BD
    	//uso de repositories SendMailClient se instancia a esa clase en el constructor 
    	return $this->sendMailClient->send($request);
    }
}