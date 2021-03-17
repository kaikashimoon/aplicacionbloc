<?php
$dir = $_GET['directorio'];
$archivo = $_POST['nombrearchivo'] . ".txt";
$contenido=$_POST['textoarchivo'];
if(file_exists("../$dir/". $archivo)){
    echo "Archivo ya existente...";
    exit;
}
if( $archivo == false ){
    echo "Error al crear el archivo.";
}else{
    $myfile = @fopen("../Directorios/$dir/" . $archivo . "", "w+") or die("Unable to open file!");
    if(file_exists("../Directorios/$dir/" . $archivo)){
        fwrite($myfile, $contenido);
    }else{
        die("No se ha podido crear el archivo."); 
    }
    fclose($myfile);
}
?>