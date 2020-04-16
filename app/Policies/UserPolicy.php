<?php
//Las políticas de acceso te permitirán de una manera increíblemente fácil, limitar y bloquear el acceso a ciertas partes de la aplicación. Cuando programamos, parte de lo que realmente queremos, es que los métodos de nuestros controladores no sean mayores a las veinte (20) líneas y esto lo logramos aislando fragmentos de código en otros archivos, como por ejemplo validaciones, consultas, políticas y así.
// cuando desea agrupar lógicamente sus acciones de autorización para cualquier modelo o recurso en particular, es la política que está buscando
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user,$ability)
    {
        //isAdmin funcion creada del modelo
        //antes de ir al metodo edit o update hacemos una validacion 
        if($user->isAdmin()){
            return true;
        }
    }

    public function edit(User $auth, User $user)
    {
        return $auth->id === $user->id;//si es uno pasa o true 
    }

    public function update(User $auth, User $user)
    {
        return $auth->id === $user->id;//si es uno pasa o true 
    }
}
