<?php  


if(!isset($_SESSION)){
  session_start();
}


$autenticacion = $_SESSION['login'] ?? false;

if(!isset( $inicio)){
    $inicio = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/build/css/app.css" />
    <link rel="shortcut icon" href="nail.png" type="image/x-icon">
    <title>Bienes Raices</title>
</head>

<body>
    <header class="header <?php echo  $inicio ?'inicio' : ''     ?>" >
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php"><img src="/build/img/logo.svg" alt="logo Hero" /></a>
                <div class="mobil-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                  </div>
                  <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="darkmode">
                    <nav class="navegacion">
                      <a href="/nosotros">Nosotros</a>
                      <a href="/propiedades">Anuncios</a>
                      <a href="/blog">Blog</a>
                      <a href="/contacto">contacto</a>

                      <?php if($autenticacion): ?>
                        <a href="/logout">Cerrar sesión</a>
                      <?php endif; ?>
                      <?php if(!$autenticacion): ?>
                        <a href="/login">Iniciar sesión</a>
                      <?php endif; ?>
                    </nav>
        
                  </div>
            </div>
            <?php 
            
            if($inicio){
              echo "<h1 data-cy='heading-sitio' >Venta de Casas y departamentos exclusivos de lujo</h1>";
            }
            ?>
        </div>
    </header>

    <?php  echo $contenido ;?>

    <footer class="footer seccion"> 
        <div class="contenedor contenido-footer">
           
              
                <nav class="navegacion">
                  <a href="nosotros.php">Nosotros</a>
                  <a href="anuncios.php">Anuncios</a>
                  <a href="blog.php">Blog</a>
                  <a href="contacto.php">contacto</a>
                </nav>
    
              
        </div>
        
        <p class="copyright">Todos los derechos reservados <?php echo date('Y');  ?> &copy; </p>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
  </body>
</html>