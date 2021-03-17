<?php
    $msg = null;
    if(isset($_POST['nombredir'])){
        $carpeta = $_POST['nombredir'];
        $ruta = "./";
        $directorio = $ruta.$carpeta;
        if(!is_dir($directorio)){
            $crear = mkdir($directorio, 0777, true);
            if($crear){
                $msg = "Directorio creado.";
            }else{
                $msg = "Ha ocurrido un problema al crear el directorio.";
            }
        }else{
            $msg = "El directorio que intentas crear ya existe";
        }
        echo $msg;
    }
?>