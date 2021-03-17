<?php
    $directorio = $_GET['directorio'];
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación bloc de notas</title>
</head>

<body>
    <header>
        <h1 class="text-center">Aplicación bloc de notas</h1>
    </header>
    <main>
        <div class="container">
            <form enctype="multipart/form-data" id="formulario" method="POST">
                <label class="form-label">Nombre:</label>
                <div>
                    <div>
                        <input class="form-control" id="nombrearchivo" type="text" name="nombrearchivo">
                    </div>
                    <div>
                        <label class="form-label" for="nombrearchivo"></label>
                    </div>
                    <div>
                        <input class="btn btn-success" value="Buscar" type="button" onclick="buscar();">
                    </div>
                </div>
                <br>
                <textarea class="form-control" id="textoarchivo" name="textoarchivo"  style="resize: none;" rows="10" cols="50"></textarea><br>
                <input class="btn btn-success" value="Crear" type="button" onclick="crear();">
                <input class="btn btn-success" value="Limpiar" type="reset">
                <input class="btn btn-danger" value="Eliminar" type="button" onclick="eliminar();">
            </form>
        </div>

        <div>
            <table>
                <caption>Lista de archivos: (<?php echo $directorio?>)</caption>
                <tr>
                    <th>Archivo</th>
                    <th>Enlace de descarga</th>
                </tr>

            <?php
                require "./listararchivos.php";
            ?>
            </table>
            <button class="btn btn-success"><a href="../Directorios/index.php">Regresar</a></button>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function crear() {
            $.ajax({
                type: 'POST',
                url: 'creararchivo.php?directorio=<?php echo $directorio?>',
                data: $('#formulario').serialize(),
                success: function(respuesta) {
                    if (respuesta) {
                        alert(respuesta);
                    } else {
                        alert("Archivo creado, cargue nuevamente la página");
                    }
                }
            });
        }
        function buscar() {

            $.ajax({
                type: 'POST',
                url: 'cargararchivo.php?directorio=<?php echo $directorio?>',
                data: $('#formulario').serialize(),
                success: function(contenido) {
                    if(contenido == "No se encontró el archivo"){
                        alert("Archivo no encontrado");
                    }else{  
                        $('#textoarchivo').val(contenido);                        
                    }
                    }
                
            });
        }
        function eliminar() {
            $.ajax({
                type: 'POST',
                url: 'eliminararchivo.php?directorio=<?php echo $directorio?>',
                data: $('#formulario').serialize(),
                success: function(contenido) {
                    if (contenido == "ok") {
                        alert("Archivo aliminado,  cargue nuevamente la página");
                    } else {
                        alert('Archivo no encontrado');
                    }
                }
            });
        }
    </script>
</body>
</html>