<?php
if(isset($_POST['nombrearchivo']) && !empty($_POST['nombrearchivo']) ){
    $dir = $_GET['directorio'];
    $archivo = $_POST['nombrearchivo'] .".txt";
    $archivo = strtolower($archivo);
    $contenido = $_POST['textoarchivo'];
    if(file_exists("../Directorios/".$dir."/". $archivo)){
        $open = fopen("../Directorios/".$dir."/".  $archivo,"w+");
        fwrite($open, $contenido);
        fclose($open);
    }else{
        echo "Archivo no existe.";
        exit;
    }
}
?>