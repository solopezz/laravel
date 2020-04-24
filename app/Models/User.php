<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Role;
use App\Models\Types;
use App\Presenters\UsersPresnters;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type_id','img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Al guardar un usaurio en automatico se encrypta el pass
    /*
    Los Accesores son los métodos que se definen en el modelo para modificar el valor de un campo antes de ser devuelto para ser usado en una vista, controlador, etc.  Por su parte los Mutadores son los métodos que modifican los valores de un campo antes de ser guardados en una base de datos.
    Ejemplo de accesor se llama return $user->first_name; 
    public function getFirstNameAttribute($value)
    {
        return strtoupper($value);
    }
    */
    //Ejemplo de un Mutador
    public function setPasswordArtributte($pass)
    {
        $this->attributes['password'] = bcrypt($pass);
    }

    public function type()
    {
        //belongsTo -> aqui esta la llave foranea type_id por eso no puede ir hasOne 
        return $this->belongsTo(Types::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasType(array $type)
    {
        //$this->type -> es una referencia al modelo typo del usaurio registrado
        //$this es una insatncia de la clase user 
        // $this para hacer referencia al objeto (instancia) actual, el user logeado con $this
        return in_array($this->type->key, $type);
        
    }

    public function isAdmin()
    {
        return $this->hasType(['admin']);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function note()
    {
        return $this->morphOne(Note::class, 'noteable');
    }

    public function tags()
    {//withTimestamps guarda fecha y hora en la tabla pivot
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

     public function present()
    {
        // Se llama el presnte se hace una instancia y se le pasa el objeto actual
        //Lo que hace es que se encarga de que en la vista no halla logica y en el modelo tampoco
        //Se hace un presents
        return new UsersPresnters($this);
    }
}
