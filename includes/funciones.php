<?php

use GuzzleHttp\Psr7\Message;

define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( $nombre, $inicio = false){
    include TEMPLATES_URL. "/${nombre}.php" ; 
}

function estadoAutenticado()  {
    session_start();

 
    if(!$_SESSION['login']){
       header('Location : /');
    }
   
}

function debug($variable){
    echo "<pre>";
    var_dump($variable);
    echo "<pre>";
    exit;
}

//* Escapar/Sanitizar el HTML
function sanitizar($html){
    $sanitizar = htmlspecialchars($html);
    return $sanitizar;
}
//Validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad'];
    return in_array($tipo,$tipos);

}
function mostrarNotificacion($code){
    $mensaje ='';

    switch($code){
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Borrado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;


}
function validarORedireccionar($url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
 
// Validar que sea un ID valido 
if (!$id){
    header("Location: ${$url}");
}
return $id;
}