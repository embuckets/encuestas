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
    <script src="js/home-admin.js"></script>
</head>

<body onload="requestEncuestas()">
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
        <div class="range" id="range">
            <label class="date-range" for="abre-date">Abre</label>
            <input id="abre-date" class="date-range-input" type="date" name="abre-date">
            <label class="date-range" for="cierra-date">Cierra</label>
            <input id="cierra-date" class="date-range-input" type="date" name="cierra-date">
            <button class="range-btn" onclick="requestEncuestas()" >Ver</button>
        </div>
        <div id="container" class="encuestas grid-container"></div>
    </main>

    <footer>
        <div class="footer">
            <p>Desarrollado por</p>
            <p>Emilio Hernández Segovia & Alejandro Gonzalez Yáñez</p>
            <p>Taller de Desarrollo de Aplicaciones Web</p>
        </div>
    </footer>
    <script>
        var abre = new Date()
        var cierra = new Date();
        abre.setDate(abre.getDate() - 7);
        cierra.setDate(cierra.getDate() + 7);
        document.getElementById("abre-date").value = abre.toISOString().split('T')[0];
        document.getElementById("cierra-date").value = cierra.toISOString().split('T')[0];
    </script>
</body>

</html>