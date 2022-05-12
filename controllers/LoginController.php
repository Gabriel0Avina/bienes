<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){

        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
          
            $auth = new Admin($_POST);

            $errores= $auth->validar();
            
            if(empty($errores)){
                //Verificar si el usuario existe
               $resultado = $auth->existeUsusario();
               if(!$resultado){
                   $errores= Admin::getErrores();
                }else{
                    //Verificar el passwrd
                   $autenticado =  $auth->comprobarPassword($resultado);
                    if($autenticado){
                        //Autenticar 
                        $auth->autenticar();

                    }else{
                        //pasword incorrecto
                        $errores = Admin::getErrores();
                    }
                }

            }
        }
       $router->render('autenticacion/login',[
        'errores' => $errores
       ]);
    }
    public static function logout(){
       session_start();
       
       $_SESSION= [];

       header('Location: /');
    }

}