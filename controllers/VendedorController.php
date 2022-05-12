<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController{
    public static function crear(Router $router){

        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
            $vendedor = new Vendedor($_POST['vendedor']);
           
            //Validar que no haya campos vacios
        
            $errores = $vendedor->validar();
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

      $router->render('vendedores/crear',[
          'errores'=> $errores,
          'vendedor' => $vendedor
      ]);
    }
    public static function actualizar(Router $router){

        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');
        $vendedor = Vendedor::find($id);
        if($_SERVER ['REQUEST_METHOD'] === 'POST'){

            $args = $_POST['vendedor'];
        
            //sincronizar objeto en memoria con lo que escrbio el usuario
            $vendedor->sincronizar($args);
          
            $errores = $vendedor->validar();
        
            if(empty($errores)){
               $vendedor->guardar();
            }
        }
       
        $router->render('vendedores/actualizar',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id){
                //Validar el tipo para eliminar
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}