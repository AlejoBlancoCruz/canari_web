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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>      
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" type="text/css" href="./css/stylesb.css">
    <title>Servicios</title>
    
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
            <a href="indexadm.php">Inicio</a>
          </li>
          <li>
            <a href="blog.php">Detalle de Servicios</a>
          </li>        
          <li>
            <a href="categorias.php">Mantenimíento de Categorías</a>
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

    <form class = "mayor" action="" method="POST">
        <fieldset id="datos">
            <legend>< Servicios ></legend>
            <label for="codigo"> Código
            <input type="number" name="codigo" id="codigo" required>    
            </label>
            <label for="nombre">Denominación
            <input type="text" name="nombre" id="nombre" size="35px" required>           
            </label>
            <legend>Descripción del Servicio</legend>
            <textarea id="descripcion" name="descripcion" rows="10" cols="70"></textarea><br>
            <label for="imagen">Imágen Asociada</label>
            <input type="file" name="imagen" id="imagen" onchange="fichero.value = this.value">
            <input type="text" name="fichero" id="fichero" size="100px" />
        </fieldset>
        <fieldset id="datos2">
            <label for="fecha">Creado :</label>
            <input type="date" name="fecha" id="fecha">
            <select name="categorias" id="categorias">
              <option value="">Seleccione la Categoría:</option> 
              <?php
                  include "./recursos/clase_pdo.php";
                  $miDb = new Db();
                  $consulta = "select categ_id, categ_nombre from tbcategorias order by categ_id";
                  $datos = $miDb->listar($consulta);
                  foreach ($datos as $data){            
                      echo '<option value="'.$data["categ_id"].'">'.$data["categ_nombre"].'</option>';
                  }
                  $miDb->cerrar();
               ?>    
              </select>
            <br>
        </fieldset>
        <fieldset id="opciones">
            <legend>< Opciones ></legend>
            <input type="button" value="Consultar" name="consulta" id="consulta" class="boton">
            <input type="submit" value="Insertar" name="accion" class="boton">
            <input type="submit" value="Eliminar" name="accion" class="boton">
            <input type="submit" value="Actualizar" name="accion" class="boton">
            <input type="reset" value="Inicializar" class="boton">
        </fieldset>
        <fieldset id="mensajes">
            <legend>< Mensajes ></legend>
            <div id="mensaje"></div>
        </fieldset>        
    </form>  
    <script>

           
        document.getElementById("consulta").addEventListener("click",function(){
            var valor = document.getElementById("codigo").value;
            $.ajax({
                url: "servicio.php",
                method:"POST",
                data: {"valor": valor},
                }).done(function(respuesta) {
                    console.log(respuesta);
                    jsonObject=JSON.parse(respuesta);
                    $("#nombre").val(jsonObject.serv_nombre);
                    $("#descripcion").val(jsonObject.serv_descripcion);  
                    $("#imagen").val(jsonObject.serv_imagen);                  
                    $("#fichero").val(jsonObject.serv_imagen);
                    $("#fecha").val(jsonObject.serv_creacion_fecha);       
                    $("#categorias").val(jsonObject.serv_categ);                    
                });
             })
    </script>
</body>
</html>
<?php

    if(isset($_POST["accion"]) and !is_null($_POST["accion"])){
        $codigo=$_POST["codigo"]??"0";
        $nombre=$_POST["nombre"]??"";
        $descripcion=$_POST["descripcion"]??"";
        $imagen=$_POST["imagen"]??"";      
        $fichero=$_POST["imagen"]??"";      
        $fecha=$_POST["fecha"]??"";
        $actualizac = $_POST["fecha"]??"";
        $categoria=$_POST["categorias"]??"0";
        $accion=$_POST["accion"];
        unset($_POST["accion"]);
        unset($_POST["codigo"]);
        unset($_POST["nombre"]);
        unset($_POST["descripcion"]);        
        unset($_POST["imagen"]);        
        unset($_POST["fichero"]);        
        unset($_POST["fecha"]);
        unset($_POST["categoria"]);

        // creamos objeto de la clase db
        include_once "./recursos/clase_pdo.php";
        $miDb=new Db();

        switch($accion){
            case "Insertar":
                $inserta="INSERT INTO tbservicios (serv_id, serv_nombre, serv_descripcion, serv_imagen, serv_creacion_fecha, serv_actualiz_fecha, serv_categ) VALUES (?,?,?,?,?,?,?)";
                $filas= $miDb->insertar($inserta,[$codigo,$nombre,$descripcion,$imagen,$fecha,$actualizac,$categoria]);
               // comprobamos la respuesta
                if ($filas==0){
                    mensaje( "Se ha(n) añadido $filas registro(s)");                  
                }else{
                    mensaje( "Ningún registro añadido");
                 }
                break;
            case "Actualizar":
                $edita="UPDATE tbservicios SET serv_nombre= ?, serv_descripcion= ?, serv_imagen= ?, serv_creacion_fecha= ?, serv_actualiz_fecha= ?, serv_categ= ? WHERE serv_id = ?";
                //ejecutamos la petición al servidor
                $filas= $miDb->editar($edita, [$nombre,$descripcion,$imagen,$fecha,$actualizac,$categoria,$codigo]);
                // comprobamos la respuesta
                if ($filas==0){
                    mensaje( "Ningún registro modificado");
                }else{
                     echo $imagen;
                    mensaje( "Se ha(n) modificado $filas registro(s)");          
                      }  
                break;
            case "Eliminar":
                $borra="DELETE FROM tbservicios WHERE serv_id= ?";
                //ejecutamos la petición al servidor
                $filas= $miDb->editar($borra,[$codigo]);
                // comprobamos la respuesta
                if ($filas==0){
                    mensaje( "Ningún registro eliminado");
                }else{
                    mensaje("Se ha(n) eliminado $filas registro(s)");
                    
                }
                break;            
        }        
    }
    
    function mensaje($texto) {
        echo "<script>document.getElementById('mensaje').innerHTML='" . $texto ."'</script>";
        echo "<script>setTimeout(function() {document.getElementById('mensaje').innerHTML=''}, 2000);</script>";
    }