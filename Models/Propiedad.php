<?php

namespace Model;

class Propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnaDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorID'];

    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorID;
    
    public function __construct($args=[])
    {
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedorID = $args['vendedorID'] ?? '';
        
    } public function validar(){
        if(!$this->titulo){
            self::$errores[]='debes añadir un titulo';
        }
        if(!$this->precio){
            self:: $errores[]='debes añadir un precio';
        }
        if( strlen($this->descripcion)<20){
            self::$errores[]='debes añadir una descripcion mayor a 20 letras';
        }
        if(!$this->habitaciones){
            self:: $errores[]='debes añadir un numero de habitaciones';
        }
        if(!$this->wc){
            self::$errores[]='debes añadir un numero de wc';
        }
        if(!$this->estacionamiento){
            self:: $errores[]='debes añadir un numero de estaciomanientos';
        }
       if(!$this->vendedorID){
        self::$errores[]='Debes añadir un vendedor';
       }
    
       if(!$this->imagen){
        self:: $errores[]= 'la imagen es obligatoria';
       }
       
        return self::$errores;
    }
   
}