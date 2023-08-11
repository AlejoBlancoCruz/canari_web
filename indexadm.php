<?php
    session_start();
    if ($_SESSION["nivel"]=="adm"){
        echo $_SESSION["usuario"]; }
        else
        {
          unset($_SESSION);
          session_destroy();
          header("refresh:1;url=inicio.php");
          exit();
        }
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Canari Servicios</title> 
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/stylesppal.css">

</head>

<body>
  <header id="header">
    <div class="center">
      <!-- Logo -->
      <div id="logo">
        <img src="./img/canari.jpg" class="app-logo" alt="logo" />
        <span id="brand">
          <strong>Canari Servicios</strong>
        </span>
      </div>
      <!-- Menu -->
      <nav id="menu">
        <ul>
          <li>
            <a href="index.php">Inicio</a>
          </li>           
          <li>
            <a href="categorias.php">Categorías</a>
          </li>
          <li>
            <a href="servicios.php">Mant. Servicios</a>
          </li>          
        </ul>
      </nav>

      <div class="clearfix"></div>
    </div>

  </header>
  <!-- <div class="main"></div> -->
  <div id="slider" class="slider-home">
    <h1>Bienvenidos a Canari Servicios</h1>
  </div>
  <div class="main">
    <div class="center">
      <section id="principal">
        <h2 class="subheader">Estamos para Servirles</h2>
        <!-- Listado de Publicaciones -->
        <div id="articleppal">
          <article class="article-item" id="article-principal">
            <div class="image-wrap">
              <img src="./img/a01.jpg" alt="imagén de presentación" />
              <div class="article-text">
                <h2>Nuestros Servicios</h2>
                <p id="parrafo_presentacion">
                  Somos una empresa especializada en el pulido y abrillantado de
                  suelos de mármol, terrazo y granito. Contamos con amplia experiencia
                  y profesionalidad en el sector. Así como con maquinaria y productos
                  de calidad que garantizan un resultado óptimo.<br /><br />


                  Nuestros trabajos, realizados con ética y responsabilidad, se
                  esfuerzan por mantener los plazos acordados y cuidando cada
                  detalle.Nuestros clientes nos avalan con su confianza y
                  fidelidad.<br /><br />

                </p>
              </div>
              <div class="clearfix"></div>
            </div>
          </article>
          <article class="article-item" id="article-secundario">
            <div class="image-wrap">
              <img src="./img/a05.jpg" alt="imagén de presentación" />
              <div class="article-text">
                <h2>Otros Servicios</h2>
                <p id="parrafo_presentacion2">
                  Además, disponemos de servicios de pintura y limpieza que
                  les brindará un servicio más completo.<br /><br />

                  Nuestro objetivo: ofrecer servicio personalizado y adaptado a las
                  necesidades del cliente. Ofrecemos precios competitivos y garantía
                  de satisfacción. Realizamos presupuestos sin compromiso, una vez
                  visitada su vivienda o local, a fin de evaluar el tipo y el estado
                  del suelo que desea abrillantar.<br /><br />

                  Si desea contratar nuestros servicios o solicitar más información,
                  puede contactarnos a través de los teléfonos (661-04-44-07 /
                  611-60-26-43), del correo electrónico carlosmanamo@gmail.com o envíando
                  a través del siguiente formularío la información deseada.
                  <br /><br />

                Esperamos poder atenderle pronto y ofrecerle la mejor solución para
                el abrillantado de su suelo y/o pintar su inmueble.
                </p>
              </div>
              <div class="clearfix"></div>
            </div>
          </article>
        </div>

        <article class="article-item" id="article-terciario">
          <div class="image-wrap">

          </div>
        </article>
      </section>

     
    </div>
    <div class="clearfix"></div>
    <footer id="footer">
      <div class="center">
        <p>
          &copy; Alegría y simpatía
        </p>
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>

<