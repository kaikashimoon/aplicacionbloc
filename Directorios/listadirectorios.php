<?php
    $listar = null;
    $directorio = opendir("../Directorios/");
    while($elemento = readdir($directorio)){
        if($elemento != "." && $elemento != ".."){
            if(is_dir("../Directorios/".$elemento)){
                $listar .= "
                <tr>
                    <td><center><strong>$elemento</strong></center></td>
                    <td><center><a class='btn btn-success' href='../BlocDeNotas/index.php?directorio=$elemento'>Abrir</a></center></td>
                </tr>";
            }
        }
    }
?>