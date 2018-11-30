<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/admin-crear.js"></script>
</head>

<body>
    <header>
        <div class="topnav">
            <a class="active left" href="home-admin.php">SIVO</a>
            <div class="dropdown right">
                <button class="dropbtn"><?php echo $_SESSION['nombre']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="crear.php"><i class="fa fa-plus"></i> Nueva encuesta</a>
                    <a href="src/logout.php"><i class="fa fa-power-off"></i> Salir</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <h1>Crear Encuesta</h1>
        <div class="form-crear" id="container">
            <form method="POST" id="form-crear" action="src/controller/crearController.php" onSubmit="return validar()">
                <label class="form-crear-titulo" for="titulo">Titulo</label>
                <input class="form-crear-input" type="text" name="titulo" required>
                <label class="form-crear-titulo" for="desc">Descripción</label>
                <textarea class="form-crear-input form-crear-input-area" name="desc" rows="5" form="form-crear" required></textarea>

                <label class="form-crear-titulo" for="abre">Abre</label>
                <label class="form-crear-titulo-inline" for="abre-date">Fecha</label>
                <input id="abre-date" class="form-crear-date"type="date" name="abre-date" required>
                <label class="form-crear-titulo-inline" for="abre-time">Hora</label>
                <input id="abre-time" class="form-crear-date"type="time" name="abre-time" required>

                <label class="form-crear-titulo" for="cierra">Cierra</label>
                <label class="form-crear-titulo-inline" for="cierra-date">Fecha</label>
                <input id="cierra-date" class="form-crear-date"type="date" name="cierra-date" required>
                <label class="form-crear-titulo-inline" for="cierra-time">Hora</label>
                <input id="cierra-time" class="form-crear-date"type="time" name="cierra-time" required>

                <label class="form-crear-titulo" for="opciones">Opciones</label>
                <input class="form-crear-input-opc" type="text" id="myInput">
                <span onclick="newOption()" class="form-crear-new" >Agregar</span>
                <div id="myOptions"></div>
                <input class="card-button" type="submit" name="submit" value="Crear">
            </form>
        </div>
    </main>

    <footer>
        <div class="footer">
            <p>Footer</p>
        </div>
    </footer>

</body>

</html>