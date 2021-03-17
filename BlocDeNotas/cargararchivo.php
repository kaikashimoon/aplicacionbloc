<?php
if(isset($_POST['nombrearchivo']) && !empty($_POST['nombrearchivo']) ){
    $directorio = $_GET['directorio'];
    $nombre = $_POST["nombrearchivo"];
    $nombre = strtolower($nombre);
    $contenido = "";
    try{
        $myfile = @fopen("../directorios/$directorio/$nombre". ".txt", "r") or die("No se encontró el archivom");
        // Output one line until end-of-file
        while (!feof($myfile)) {
                 $contenido .= fgets($myfile);
        }
        fclose($myfile);
        echo $contenido;
        }catch(Throwable $e){        
        } 
}
?>