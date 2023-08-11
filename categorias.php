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
   
    
    <link rel="stylesheet" type="text/css" href="./css/stylesb.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Categorías</title>    
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
            <a href="indexadm.php">Inicio</a>
          </li>
          <li>
            <a href="blog.php">Detalle de Servicios</a>
          </li>         
          <li>
            <a href="servicios.php">Mantenimíento de Servicios</a>
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
            <legend>< Categorías de Servicios ></legend>
            <label for="codigo"> Código :
            <input type="number" name="codigo" id="codigo" size=4>  
            </label>  
            <label for="nombre">Denominación :
            <input type="text" name="nombre" id="nombre" size=20><br>
            </label>
        </fieldset>
        <fieldset id="listado">
            <legend>< Listado ></legend>
            <div id="lista"></div>
        </fieldset>
        <fieldset id="opciones">
            <legend>< Opciones ></legend>
            <input type="submit" value="Consultar" name="accion"  class="boton">
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
</body>
</html>

<?php

    if(isset($_POST["accion"]) and !is_null($_POST["accion"])){

        $codigo=$_POST["codigo"]??"0";
        $nombre=$_POST["nombre"]??"VACIA";
        $accion=$_POST["accion"];
        unset($_POST["accion"]);
        unset($_POST["codigo"]);
        unset($_POST["nombre"]);

        // creamos objeto de la clase db
        include_once "./recursos/clase_pdo.php";
        $miDb=new Db();

        switch($accion){
            case "Insertar":
                $inserta="INSERT INTO tbcategorias (categ_id, categ_nombre) VALUES (?,?)";
                $filas= $miDb->insertar($inserta,[$codigo,$nombre]);
               // comprobamos la respuesta
                if ($filas==0){
                    mensaje( "Ningún registro añadido");
                }else{
                    mensaje( "Se ha(n) añadido $filas registro(s)");
                }
                break;
            case "Actualizar":
                $edita="UPDATE tbcategorias SET categ_nombre= ? WHERE categ_id = ?";
                //ejecutamos la petición al servidor
                $filas= $miDb->editar($edita, [$nombre,$codigo]);
                // comprobamos la respuesta
                if ($filas==0){
                    mensaje( "Ningún registro modificado");
                }else{
                    mensaje( "Se ha(n) modificado $filas registro(s)");              }  
                break;
            case "Eliminar":
                $borra="DELETE FROM tbcategorias WHERE categ_id= ?";
                //ejecutamos la petición al servidor
                $filas= $miDb->editar($borra,[$codigo]);
                // comprobamos la respuesta
                if ($filas==0){
                    mensaje( "Ningún registro eliminado");
                }else{
                    mensaje("Se ha(n) eliminado $filas registro(s)");
                    
                }
                break;
            case "Consultar":
                echo "<script>document.getElementById('codigo').value='" . $codigo ."'</script>";
                $consulta="SELECT categ_nombre FROM tbcategorias  WHERE categ_id= ?";

                //ejecutamos la petición al servidor
                $filas= $miDb->consultar($consulta,[$codigo]);
                $valor=$filas["categ_nombre"]??"No encontrada";
                echo "<script>document.getElementById('nombre').value='" . $valor ."'</script>";
                break;
        }
        
    }
    listado();
    
    function mensaje($texto) {
        echo "<script>document.getElementById('mensaje').innerHTML='" . $texto ."'</script>";
        echo "<script>setTimeout(function() {document.getElementById('mensaje').innerHTML=''}, 2000);</script>";
    }

    function listado() {
        //if(isset($_POST["accion"]) and !is_null($_POST["accion"])){
            include_once "./recursos/clase_pdo.php";
            // creamos objeto de la clase db
            $miDb=new Db();
            // creamos la consulta a realizar
            $consulta="SELECT * FROM tbcategorias ORDER BY categ_nombre";
            // ejecutamos la consulta
            $filas = $miDb->listar($consulta);
            //recorremos cada resultado
            $texto= "<table>";
            $texto.= "<tr><th>Código</th><th></th><th>Categorias</th></tr>";
            foreach ($filas as $fila)
            {
                $texto.= "<tr><td>". $fila["categ_id"] . "</td><td>  </td><td>" . $fila["categ_nombre"]. "</td></tr>"; 
            }
            $texto.= "</table>";
            echo "<script>document.getElementById('lista').innerHTML='" .$texto."' </script>";
        //}    

    }
?>