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

</head>

<body>
    <header>
        <div class="topnav">
            <a class="active left" href="#">SIVO</a>
        </div>
    </header>

    <main>
        <form action="src/controller/login.php" method="POST">
            <div class="form-log">
                <label for="uname"><b>Matrícula</b></label>
                <input class="form-input" type="text" placeholder="" name="uname" required>

                <label for="psw"><b>Contraseña</b></label>
                <input class="form-input" type="password" placeholder="" name="psw" required>

                <button class="form-submit" type="submit">Entrar</button>
        </form>
        <div ><?php echo $error; ?></div>
    
    </main>

    <footer>
        <div class="footer">
            <p>Desarrollado por</p>
            <p>Emilio Hernández Segovia & Alejandro Gonzalez Yáñez</p>
            <p>Taller de Desarrollo de Aplicaciones Web</p>
        </div>
    </footer>

</body>

</html>