<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

      $router->render('paginas/index',[
          'propiedades' =>$propiedades,
          'inicio'=>$inicio


      ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){

      $id = validarORedireccionar('/propiedades');

      $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router){

        $router->render('paginas/blog');
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router){
        
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];
         
            //Crear una instancia de PHPmailer
            $mail = new PHPMailer();

            //configurar SMTP
            
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'd9ec80fb129251';
            $mail->Password = 'ef649ca9140fd9';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar el contenido del email

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo Mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            // Enviar de forma condicional algunos campos de email o telefo
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= 'Eligio ser Contactado por Telefono';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha para contactarlo: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>hora para contactarlo: ' . $respuestas['hora'] . '</p>';
            }else{
                $contenido .= 'Eligio ser Contactado por Email';
                $contenido .= '<p>Contacto: ' . $respuestas['email'] . '</p>';
            }
            
          
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Interes: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Presupuesto: ' . $respuestas['precio'] . '</p>';
           
         
            $contenido .= '</html>';
            
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';
            if($mail->send()){
                $mensaje = 'Mensaje Enviado con Exito';
            }else{
                $mensaje = 'No se envio el mensaje';
            }
            

        }
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }
    
}