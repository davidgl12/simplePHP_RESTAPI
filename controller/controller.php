<?php

    require_once("../model/catalogo.php");
    header('Content-Type: application/json; charset=utf-8');

    if($_SERVER["REQUEST_METHOD"] = "GET"){
        
        $catalogo = new Catalogo();

        if(!empty($_GET["id"])){
            $sql = "SELECT * FROM productos WHERE id = {$_GET["id"]}";

            if($_GET["id"] == "todos"){
                $sql = "SELECT * FROM productos";
            }
            //$catalogo->ejecutarQuery($sql);
            //echo json_encode($catalogo->$dataArr);
            echo json_encode($catalogo->ejecutarQuery($sql));
        }
    }

?>