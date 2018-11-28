<?php
   //  xdebug_break();
    session_start( );
    // echo $_SERVER['HTTP_X_FORWARDED_FOR'] ;
    // echo  $_SERVER['REMOTE_ADDR'];
    require 'conexion.php';
    require 'alumnoDAO.php';
    require 'validate.php';
    require 'adminDAO.php';

    
    $conn = getConnection();

    if ($conn->connect_error) {
        $error = "Por el momento la Base de Datos no funciona<br>";
        $error += $conn->connect_error;
        $conn->close();
        header('location: ../../index.html');
        // jio
        // fdsfdsafdsa
    }

    // if($_SERVER["REQUEST_METHOD"] == "POST") {

        // $myusername = mysqli_real_escape_string($conn, $_POST['uname']);
        // $mypassword = mysqli_real_escape_string($conn, $_POST['psw']); 
        $myusername = "123";
        $mypassword = "123";

        $rol = validar($myusername, $mypassword, $conn);
        if ($rol["rol"] == "alumno"){
            $alumno = getAlumnoPorMatricula($myusername, $conn);
            $_SESSION['login_user'] = $myusername;
            $_SESSION['login_user_name'] = $alumno['nombre'];
            
            // $conn->close();
            header('location: ../../home.html');
        }
        else if ($rol["rol"] == "admin"){
            $admin = getAdminPorMatricula($myusername, $conn);
            $_SESSION['login_user'] = $myusername;
            $_SESSION['login_user_name'] = $admin['nombre'];
            // $conn->close();
            header('location: ../../home.html');

        } else {
            $error = "Your Login Name or Password is invalid";
            // $conn->close();
            header('location: ../../index.html');

        }
    // }
    $conn->close();

    // $sql = "SELECT matricula, password FROM login WHERE matricula = '$myusername' and password = '$mypassword'";
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);      
    // $count = mysqli_num_rows($result);

    // if ($count == 1) {
    //     //session_register("myusername");
    //     $_SESSION['login_user'] = $myusername;

    //     header('location: ../../home.html');
    // } else {
    //         $error = "Your Login Name or Password is invalid";
    //         header('location: ../../index.html');
    //     }
    // }

    // echo 'Connection succesful';
    // $conn->close();

?>