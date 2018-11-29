<?php
    session_start( );
    require 'conexion.php';
    require 'alumnoDAO.php';
    require 'validate.php';
    require 'adminDAO.php';


    $conn = getConnection();

    if ($conn->connect_error) {
        $error = "Por el momento la Base de Datos no funciona<br>";
        $error += $conn->connect_error;
        $conn->close();
        header('location: ../../index.php');
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = mysqli_real_escape_string($conn, $_POST['uname']);
        $mypassword = mysqli_real_escape_string($conn, $_POST['psw']); 
        $rol = validar($myusername, $mypassword, $conn);
        if ($rol["rol"] == "alumno"){
            $alumno = getAlumnoPorMatricula($myusername, $conn);
            $_SESSION['matricula'] = $myusername;
            $_SESSION['nombre'] = $alumno['nombre'];

            // $conn->close();
            header('location: ../../home.php');
        }
        else if ($rol["rol"] == "admin"){
            $admin = getAdminPorMatricula($myusername, $conn);
            $_SESSION['matricula'] = $myusername;
            $_SESSION['nombre'] = $admin['nombre'];
            // $conn->close();
            header('location: ../../home-admin.php');

        }
        else {
            $error = "Your Login Name or Password is invalid";
            // $conn->close();
            header('location: ../../index.php');
        }
    }
    $conn->close();

?>