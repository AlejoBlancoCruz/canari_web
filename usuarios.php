<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registro Usuario</title>
</head>
<body>
    <form action="" method="POST">
    <div class="form-group">
        <label for="nombre">Nombre :
            <input type="text" name="nombre">
        </label>
        </div>
        <div class="form-group">
        <label for="apellido">Apellidos :
            <input type="text" name="apellido">
        </label>
        </div>
        <div class="form-group">
        <label for="email">Email :
            <input type="email" name="email" id="email">
        </label>
        </div>
        <div class="form-group">
        <label for="password">Contraseña:
            <input type="password" name="password" id="password">
        </label>
        </div>
        <div class="form-group">
        <label for="nivel">Rol o Nivel:</label>
        <select name="nivel" id="nivel">
                <option value="adm">Administrador</option>
                <option value="usr">Usuario</option>
        </select>
        </div><br>
            <input type="submit" value="enviar" name="enviar" class="btn btn-primary">
        <!-- <button type="submit" name="enviar">Enviar</button> -->
        <div id="mensaje"></div>
    </form>   
    
</body>
</html>

<?php
     if(isset($_POST["enviar"]) and !is_null($_POST["enviar"] and !empty($_POST["enviar"]))){
           
            $nombre=$_POST["nombre"]??"";
            $apellido=$_POST["apellido"]??"";
            $email=$_POST["email"]??"";
            $clave=$_POST["password"]??"";
            $nivel=$_POST["nivel"]??"";
            $clavehash = password_hash($clave, PASSWORD_DEFAULT);   
            
            include_once "./recursos/clase_pdo.php";
            $miDb=new Db();

            $consulta=("SELECT nombre, email, nivel, clave FROM usuario  WHERE email = ?");
            $filas = $miDb->consultar($consulta, [$email]);
            print_r($email);
            if ($filas){
                mensaje("Usuario ya registrado!!!".$email);
            }
            else {
                $miDb=new Db();
                $inserta="INSERT INTO usuario (nombre, apellidos, email, clave, nivel) 
                VALUES (?,?,?,?,?)";
                $filas= $miDb->insertar($inserta,[$nombre,$apellido,$email,$clavehash,$nivel]);
                // comprobamos la respuesta
                if ($filas==0){
                    mensaje( "Ningún registro añadido");
                }else{
                    mensaje( "Se ha añadido el registro");
                }
            }
            unset($miDb);

        }
    

?>

<?php
     function mensaje($texto) {
        echo "<script>document.getElementById('mensaje').innerHTML='" . $texto ."'</script>";
        echo "<script>setTimeout(function() {document.getElementById('mensaje').innerHTML=''}, 4000);</script>";
    }
?>

