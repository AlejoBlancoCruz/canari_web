<?php
 class Db {
    private $conexion; 
    

    // Constructor de la clase
    function __construct() 
    {
        include("settings.php");    
    
        $dsn = "mysql:host=$servidor;dbname=$dbname;charset=utf8";

        try {
            $this->conexion = new PDO($dsn, $username, $password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            die("Fallo al conectar con la BBDD: " . $e->getMessage());
        }
    }

    // Destructor de la clase (se llama automaticamente al unset($miDb))
    function __destruct() 
    {
        $this->cerrar();
    }

    function cerrar() 
    {
        $this->conexion = null;
    }



    function listar($sql, $params = array()) 
    {
        try {
            $statement = $this->conexion->prepare($sql);
            $statement->execute($params);
            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    // Método que trata consultas devolviendo un registro
    function consultar($sql, $params = array()) 
    {
        try {
            $statement = $this->conexion->prepare($sql);
            $statement->execute($params);
            $fila = $statement->fetch(PDO::FETCH_ASSOC);
            if ($fila) {
                return $fila;
            } 
            // else {
            //     return "no encontrado";
            // }
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }
     // Método que trata inserción devolviendo id de último registro
    // si el campo es autoincremental
    function insertar($sql, $params = array()) 
    {
        try {
            $statement = $this->conexion->prepare($sql);
            $statement->execute($params);
            $id = $this->conexion->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            die("Error al insertar: " . $e->getMessage());
        }
    }
    // Método que trata edición y borrado 
    // devuelve el número de fila afectadas
    function editar($sql, $params = array())  
    {
        try {
            $statement = $this->conexion->prepare($sql);
            $statement->execute($params);
            $numFilas = $statement->rowCount();
            return $numFilas;
        } catch (PDOException $e) {
            die("Error al editar: " . $e->getMessage());
        }
    }

    // Método que devuelve el código de error y mensaje de error
    function error() 
    {
        $errorInfo = $this->conexion->errorInfo();
        return $errorInfo[1] . ": " . $errorInfo[2];
    }

 }
?>
