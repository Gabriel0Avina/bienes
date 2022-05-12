<?php

namespace Model;

class ActiveRecord{
      //*Base de datos
      protected static $db;
      protected static $columnaDB = [];
      protected static $tabla = '';
  
      //* Errores
      protected static $errores =[];
  
  
      //Definir la conexion a la BD
      public static function setDB($database){
          self::$db=$database;
      }
      
     
      public function guardar(){
          if(!is_null($this->id)){
              $this->actualizar();
          }else{
              $this->crear();
          }
      }
      public function crear(){
  
          //Sanitizar la entrada de datos
          $atributos = $this->sanitizarAtributos(); 
          $llaves = join(', ',array_keys($atributos));
          $valores = join("', '", array_values($atributos));
          //insertar a la base de datos
          $query = "INSERT INTO " . static::$tabla . " ( ";
          $query .= $llaves;
          $query .= " ) VALUES (' ";
          $query .=$valores;
          $query .= " ') ";
  
         
          $resultado =self::$db->query($query);
          if($resultado){
             
              header('Location: /admin?resultado=1');
          }
      }
      public function actualizar(){
          $atributos = $this->sanitizarAtributos(); 
          $valores = [];
          foreach($atributos as $key=> $value){
              $valores[]="{$key}='{$value}'";
          }
  
          $query = "UPDATE " . static::$tabla . " SET ";
          $query .= join(', ', $valores);
          $query .= " WHERE id = '" . self::$db->escape_string($this->id)."' ";
          $query .= " LIMIT 1 ";
  
          $resultado = self::$db->query($query);
          
          if($resultado){        
              header('Location: /admin?resultado=2');
          }
          
      } 
      public function eliminar(){
         
          //ELiminar la propiedad
          $query = "DELETE FROM " . static::$tabla . " WHERE id = ". self::$db->escape_string($this->id). " LIMIT 1 ";
          $resultado = self::$db->query($query);
          if($resultado){
              $this->borrarImagen();
              header('Location: /admin?resultado=3');
             }
      }
     
      public function atributos(){
          $atributos = [];
          foreach(static::$columnaDB as $columna){
              if($columna === 'id') continue;
              $atributos[$columna]= $this->$columna;
          }
          return $atributos;
  
      }
  
      public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizando = [];
        foreach($atributos as $key => $value){
            $sanitizando[$key] = self::$db->escape_string($value);
        }
       return $sanitizando;
      }
  
      public function setImage($imagen){
          //*Eliminar la imagen previa
          if(!is_null( $this->id)){
             $this->borrarImagen();
          }
          //* Asignar al atributo imagen el nombre de la imagen 
          if($imagen){
              $this->imagen = $imagen;
          }
      }
      public function borrarImagen(){
  
           $existeArchivo =  file_exists(CARPETA_IMAGENES.$this->imagen);
           if($existeArchivo){
               unlink(CARPETA_IMAGENES. $this->imagen);
           }
      }
  
      //*Validacion
  
      public static function getErrores(){
          return static::$errores;
      }

      public function validar(){
         
         static::$errores = [];
          return static::$errores;
      }
  
              //* Lista todas las propiedades 
              public static function all(){
              $query= "SELECT * FROM ". static::$tabla;
              
              $resultado = self::consultarSQL($query);
  
              return $resultado;
              
              }
              public static function get($cantidad){
                $query= "SELECT * FROM ". static::$tabla . " LIMIT " . $cantidad;
                
                $resultado = self::consultarSQL($query);
    
                return $resultado;
                
                }
              //* Obtine un numero limitado de registros

              //* Busca un registro por su Id
              public static function find($id){
                  $query = "SELECT * FROM " . static::$tabla . " WHERE id =${id}";
  
                  $resultado =self::consultarSQL($query);
                  return array_shift($resultado);
              }
  
              public static function consultarSQL($query){
  
                  //Consultar la base de datos
                  $resultado = self::$db->query($query);
  
                  //iterar los resultados
                  $array = [];
                  while ($registro = $resultado->fetch_assoc()){
                      $array[]= static::crearObjeto($registro);
                  }
              
                  //liberar la memoria 
                  $resultado->free();
                  //regresar los resultados
                  return $array;
  
              }
  
              protected static function crearObjeto($registro){
                  $objeto = new static;
                  foreach($registro as $key => $value){
                      if(property_exists($objeto, $key)){
                              $objeto->$key =$value;
                      }
                  }
                  return $objeto;
              }
      
      //*Sincroniza el objeto en la memoria con los cambios hechos por el usuario
       public function sincronizar($args =[]){
          foreach($args as $key => $value){
              if(property_exists($this, $key) && !is_null($value)){
                  $this->$key = $value;
              }
          }
       }
}