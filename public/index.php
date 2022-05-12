<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$ruoter = new Router;


$ruoter->get('/admin',[PropiedadController::class, 'index']);
$ruoter->get('/propiedades/crear',[PropiedadController::class, 'crear']);
$ruoter->post('/propiedades/crear',[PropiedadController::class, 'crear']);
$ruoter->get('/propiedades/actualizar',[PropiedadController::class, 'actualizar']);
$ruoter->post('/propiedades/actualizar',[PropiedadController::class, 'actualizar']);
$ruoter->post('/propiedades/eliminar',[PropiedadController::class, 'eliminar']);

$ruoter->get('/vendedores/crear',[VendedorController::class, 'crear']);
$ruoter->post('/vendedores/crear',[VendedorController::class, 'crear']);
$ruoter->get('/vendedores/actualizar',[VendedorController::class, 'actualizar']);
$ruoter->post('/vendedores/actualizar',[VendedorController::class, 'actualizar']);
$ruoter->post('/vendedores/eliminar',[VendedorController::class, 'eliminar']);

$ruoter->get('/',[PaginasController::class, 'index']);
$ruoter->get('/nosotros',[PaginasController::class, 'nosotros']);
$ruoter->get('/propiedades',[PaginasController::class, 'propiedades']);
$ruoter->get('/propiedad',[PaginasController::class, 'propiedad']);
$ruoter->get('/blog',[PaginasController::class, 'blog']);
$ruoter->get('/entrada',[PaginasController::class, 'entrada']);
$ruoter->get('/contacto',[PaginasController::class, 'contacto']);
$ruoter->post('/contacto',[PaginasController::class, 'contacto']);

// Login y autenticacion
$ruoter->get('/login',[LoginController::class, 'login']);
$ruoter->post('/login',[LoginController::class, 'login']);
$ruoter->get('/logout',[LoginController::class, 'logout']);



$ruoter->comprobarRutas();