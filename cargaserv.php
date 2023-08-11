<?php
        include_once "./recursos/clase_pdo.php";
        $miDb=new Db();
        //$codigo=$_POST["valor"]??"0";   
        //$consulta="SELECT * FROM tbservicios  WHERE serv_id= ?";
        $consulta="SELECT * FROM tbservicios  order by serv_id";
        //ejecutamos la petición al servidor
        $filas= $miDb->listar($consulta);
        echo json_encode($filas);
?>

