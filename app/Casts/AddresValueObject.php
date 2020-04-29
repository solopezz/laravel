<?php 
namespace App\Casts;

class AddresValueObject extends AnotherClass
{
	public $pais;
	public $estado;
	public $ciuidad;
	public $calle;

	
	public function __construct($pais, $estado, $ciuidad, $calle)
	{
		# code...
		$this->pais = $pais;
		$this->estado = $estado;
		$this->ciuidad = $ciuidad;
		$this->calle = $calle;
	}
}