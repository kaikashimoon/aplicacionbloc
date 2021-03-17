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
        <h1 class="text-center">Directorios</h1>
    </header>
    <main>
        <div class="container">
            <form enctype="multipart/form-data" id="formulario" method="POST">
                <label class="form-label">Nombre directorio:</label>
                <div>
                    <div>
                        <input class="form-control" id="nombredir" type="text" name="nombredir">
                    </div>
                    <div>
                        <input class="btn btn-success" value="Crear" type="button" onclick="crear();">
                    </div>
                    <div>
                        <input class="btn btn-danger" value="Eliminar" type="button" onclick="eliminar();">
                    </div>
                </div>
                <br>
            </form>
        </div>
        <div>
            <table>
                <caption>Lista de directorios</caption>
            <?php
                require "./listadirectorios.php";
                echo $listar;
            ?>
            </table>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function crear(){
            $.ajax({
                type: 'POST',
                url: 'creardirectorio.php',
                data: $('#formulario').serialize(),
                success: function(respuesta) {
                    if (respuesta == "Directorio creado.") {
                        alert("Directorio creado, cargue nuevamente la página");
                    } else {
                        alert("Error en la creacion del directorio.");
                    }
                }
            });

        }
        function eliminar(){
            $.ajax({
                type: 'POST',
                url: 'eliminardirectorio.php',
                data: $('#formulario').serialize(),
                success: function(respuesta) {
                    if (respuesta == "Ha eliminado el directorio.") {
                        alert("Directorio eliminado, cargue nuevamente la página");
                    } else {
                        alert(respuesta);
                    }
                }
            });
        }
    </script>