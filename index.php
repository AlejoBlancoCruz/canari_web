<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <title>J.C. Coello Servicios</title>
  <!-- Hoja de Estilos-->
  <link rel="stylesheet" type="text/css" href="./css/stylesppal.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body>
  <header id="header">
    <div class="center">
      <!-- Logo -->
      <div id="logo">
        <img src="./img/logojc.jpg" class="app-logo" alt="logo" />
        <span id="brand">
          <strong> J.C.COELLO </strong>
        </span>
      </div>
      <!-- Menu -->
      <nav id="menu">
        <ul>
          <li>
            <a href="index.php">Inicio</a>
          </li>
          <li>
            <a href="blog.php">Detalle de Servicios</a>
          </li>
        </ul>
      </nav>

      <div class="clearfix"></div>
    </div>

  </header>
  <div id="slider" class="slider-home">
    <h1>J.C. Coello Servicios de Abrillantado, Pintura y Limpieza</h1>
  </div>

    <div class="center">
     
        <div>
          <article>
            <div class="image-wrap">
              <img src="./img/a01.jpg" alt="imagén de presentación" />
              <div class="article-text">
                <h2>Abrillantado de Pisos</h2>
                <p>
                  Somos una empresa especializada en el pulido y abrillantado de suelos de mármol, terrazo y granito.
                  Contamos con amplia experiencia y profesionalidad en el sector, así como con la maquinaria y productos
                  de calidad que garantizan un resultado óptimo.<br /><br />


                  Nuestros trabajos, realizados con ética y responsabilidad, se esfuerzan por mantener los plazos
                  acordados y cuidando cada detalle. Nuestros clientes nos avalan con su confianza y
                  fidelidad.<br /><br />

                </p>
              </div>
              <div class="clearfix"></div>
            </div>
          </article>
          <article>
            <div class="image-wrap">
              <img src="./img/pintura1.jpg" alt="imagén de presentación" />
              <div class="article-text">
                <h2>Pintura de paredes y techos</h2>
                <p>
                  ¿Está buscando renovar el aspecto de su casa o negocio? ¿Quiere darle un toque de color y personalidad
                  a sus paredes? ¡No busque más! Le ofrecemos los mejores servicios de pintura de inmuebles, con
                  calidad, rapidez y profesionalidad. Contamos con un equipo de pintores expertos, que se encargan de
                  preparar, proteger y pintar cualquier superficie, ya sea interior o exterior. Utilizamos materiales de
                  primera calidad, que garantizan un acabado duradero y resistente. Además, le asesoramos sobre las
                  mejores opciones adaptándonos a sus gustos y presupuesto. Le daremos un presupuesto sin compromiso y
                  le atenderemos con la mayor cordialidad. J.C. Coello, su mejor opción para pintar su
                  inmueble.<br /><br />
              </div>
            </div>
          </article>
          <article>
            <div class="image-wrap">
              <img src="./img/limpieza1.jpg" alt="imagén de presentación" />
              <div class="article-text">
                <h2>Limpieza de muebles e inmuebles</h2>
                <p>
                  Además, en J.C. Coello le ofrecemos los mejores servicios de limpieza de muebles e inmuebles, con
                  personal cualificado, productos ecológicos y precios competitivos. Contamos con más de 10 años de
                  experiencia en el sector y garantizamos la satisfacción de nuestros clientes. No importa el tamaño o
                  el tipo de inmueble que tenga, nosotros nos encargamos de dejarlo impecable. Solicite su presupuesto
                  sin compromiso y disfrute de un ambiente limpio y saludable.<br /><br /><br />

                  Nuestro objetivo: ofrecer servicio personalizado y adaptado a las
                  necesidades del cliente. Ofrecemos precios competitivos y garantía
                  de satisfacción. Realizamos presupuestos sin compromiso, una vez
                  visitada su vivienda o local, a fin de evaluar el tipo de trabajo y el material
                  que es necesario para cunplir los requerimientos de la obra.<br /><br />

                  Si desea contratar nuestros servicios o solicitar más información,
                  puede contactarnos a través de los <strong>teléfonos (661-04-44-07 /
                    611-60-26-43)</strong>, del <strong>correo electrónico serviciosjccoello@gmail.com</strong> o
                  envíando a través del siguiente formularío la información deseada.</p>
                <br /><br />
              </div>
            </div>
        </div>
     


    </div>
  
  <div class="formulario">
    <form action="" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name='nombre' id="nombre" placeholder="nombre...">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name='email' id="email" placeholder="email..." size="80px">
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Mensaje</label>
        <textarea class="form-control" name='mensaje' id="mensaje" rows="3"></textarea>
      </div>
      <div><span></span><br></div>

      <input class="boton_personalizado" type="submit" value="enviar" name="enviar">
    </form>
    <br><br>
    <p>Esperamos poder atenderle pronto y ofrecerle la mejor solución para
      el abrillantado de su suelo y/o pintar su inmueble.</p>
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

<?php 
 if(isset($_POST["enviar"]) and !is_null($_POST["enviar"] and !empty($_POST["enviar"]))){
           
	$nombre=$_POST['nombre']??"";
  $email=$_POST["email"]??"";
	$asunto = 'Formulario Rellenado';
	$mensaje = "Nombre: ".$nombre."<br> Email:". $email."<br> Mensaje:".$_POST['mensaje'];
  $correo = 'blancoalejo@gmail.com';

	if(mail($correo, $asunto, $mensaje)){
		echo "Correo enviado";
	}
  else { echo 'Correo no enviado......!!!!!'; }
}
 ?>