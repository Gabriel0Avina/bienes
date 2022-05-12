<?php
namespace Model;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnaDB = ['id','nombre','apellido','telefono'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args=[])
    {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
   
        
    }
    public function validar(){
        if(!$this->nombre){
            self::$errores[]='debes añadir un nombre';
        }
        if(!$this->apellido){
            self::$errores[]='debes añadir un apellido';
        }
        if(!$this->telefono){
            self::$errores[]='debes añadir un telefono';
        }
        if(!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[] = 'formato no valido';
        }
        return self::$errores;
    }

}