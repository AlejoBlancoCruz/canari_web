<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <form action="" method="POST">
    <div class="form-group">
        <label for="email">Email  :
            <input type="email" name="email" id="email">
        </label>
        </div>
        <div class="form-group">
        <label for="password">Contraseña:
            <input type="password" name="password" id="password">
        </label>
        </div><br>
        <input type="submit" value="enviar" name="enviar" class="btn btn-outline-success"><br><br>
        <div id="mensaje" class="bg-primary text-light"></div>
    </form>   
    
</body>
</html>

<?php
     if(isset($_POST["enviar"]) and !is_null($_POST["enviar"] and !empty($_POST["enviar"]))){
           
            $email=$_POST["email"]??"";
            $clave=$_POST["password"]??"";           

            include_once "./recursos/clase_pdo.php";
            $miDb=new Db();

            $consulta=("SELECT nombre, email, nivel, clave FROM usuario  WHERE email = ?");
            $filas = $miDb->consultar($consulta, [$email]);
            if ($filas){
                if (password_verify($clave,$filas["clave"])){ 
                            session_start();                    
                            $_SESSION["usuario"]=$filas["nombre"];
                            $_SESSION["nivel"]=$filas["nivel"];
                            mensaje('!!! Bienvenido '.$filas["nombre"].' !!!' );
                            header("Location: indexadm.php");

                            }
                else {
                            mensaje ('Clave incorrecta!!!');
                    } 
                        }
                else { 
                       mensaje('No se ha podido iniciar sesion. Usuario incorrecto!!');
                            } 
           
            }
?>

<?php
     function mensaje($texto) {
        echo "<script>document.getElementById('mensaje').innerHTML='" . $texto ."'</script>";
        echo "<script>setTimeout(function() {document.getElementById('mensaje').innerHTML=''}, 4000);</script>";
    }
?>