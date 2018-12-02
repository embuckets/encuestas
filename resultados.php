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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script src="js/resultados-admin.js"></script>
    <script> 
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);
    </script>        
    
</head>

<body onload="requestResultados()">
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
        <h1>Resultados Encuesta</h1>
        <div class="card justify">
            <h3 id="titulo" class="card-title"></h3>
            <p id="desc" class="card-text"></p>
            <p id="abre" class="text-muted"></p>
            <p id="cierra" class="text-muted"></p>
            <div id="resultados"></div>
        </div>
        <p id="demo"></p>
    </main>

    <footer>
        <div class="footer">
            <p>Footer</p>
        </div>
    </footer>

</body>

</html>