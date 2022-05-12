<?php 

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


require 'funciones.php';
require 'config/database.php';

//conectarse a la base de datos 
$db = conectarDB();
use Model\Propiedad;
use Model\ActiveRecord;

$propiedad = new Propiedad;

ActiveRecord::setDB($db);