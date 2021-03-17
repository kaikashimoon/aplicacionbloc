<?php
$dir = $_GET['directorio'];
    if(isset($_POST['nombrearchivo']) && !empty($_POST['nombrearchivo']) ){
        $archivo = $_POST['nombrearchivo'];
        unlink("../Directorios/$dir/".$archivo. ".txt");
        echo "ok";

    }
?>