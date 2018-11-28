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
            <a class="active left" href="#home">SIVO</a>
            <a class="active-crear right" href="crear.php"><i class="fa fa-plus"></i></a>
            <div class="dropdown right">
                <button class="dropbtn"><?php echo $_SESSION['nombre']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#"><i class="fa fa-power-off"></i> Salir</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div id="container" class="encuestas grid-container"></div>
    </main>

    <footer>
        <div class="footer">
            <p>Footer</p>
        </div>
    </footer>

</body>

</html>