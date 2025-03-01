<?php
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: login.html");
    exit;
}
function logout() {
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit;
}
if(isset($_GET['logout'])) {
    logout();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html"><img src="logo.png" width="120px"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="session.php">Bienvenido : <?php echo $username; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="servicios.php">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="formulario.php">Formulario</a></li>
                    <li class="nav-item"><a class="nav-link" href="?logout=true">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <body>
        <header class="masthead">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <div class="container">
                <script src="java.js"></script>
                <center>
                    <h2 class="mt-5" style="color: white;">Formulario de Registro de Nuevo Operador y Unidad de Camión
                    </h2>
                </center>
                <form action="" class="formulario" id="formulario" name="formulario">
                    <h2>Operador</h2>
                    <input type="text" name="txt_clave" id="txt_clave" placeholder="Clave" maxlength="5">
                    <input type="text" name="txt_nombre" id="txt_nombre" placeholder="Nombre">
                    <input type="text" name="txt_paterno" id="txt_paterno" placeholder="Apellido Paterno">
                    <input type="text" name="txt_materno" id="txt_materno" placeholder="Apellido Materno">
                    <input type="text" name="txt_nacimiento" id="txt_nacimiento" placeholder="Fecha de nacimiento">
                    <select name="sexo" id="combo1" title="...">
                        <option value="0" disabled selected>Sexo</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    <input type="text" name="txt_telefono" id="txt_telefono" placeholder="Telefono" maxlength="10">
                    <input type="text" name="txt_correo" id="txt_correo" placeholder="Correo">

                    <h2>Unidad</h2>
                    <input type="text" name="txt_modelo" id="txt_modelo" placeholder="Modelo de camion">
                    <input type="text" name="txt_marca" id="txt_marca" placeholder="Marca del camión">
                    <input type="text" name="txt_matricula" id="txt_matricula" placeholder="Placas del camión"
                        maxlength="7">
                    <input type="text" name="txt_fabricacion" id="txt_fabricacion" placeholder="Año de fabricación"
                        maxlength="4">
                    <select name="tipo" id="combo2" title="...">
                        <option value="0" disabled selected>Tipo de camión</option>
                    </select>
                    <input type="text" name="txt_capacidad" id="txt_capacidad" placeholder="Capacidad en Kg"><br>
                    <center>
                        <input type="checkbox" name="terminos" id="terminos">
                        <label for="terminos">Acepto Terminos y Condiciones</label>
                        <input type="button" id="bt_registrar" value="Registrarse">
                    </center>
                </form>
                <style>
                    h1,
                    h2 {
                        color: #343a40;
                    }

                    .formulario {
                        max-width: 1200px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        border-radius: 8px;
                        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
                    }

                    /* Flexbox para mantener los campos de texto en línea */
                    .formulario h2 {
                        margin-top: 20px;
                    }

                    .formulario input[type="text"],
                    .formulario select {
                        flex: 1;
                        margin: 5px;
                        padding: 10px;
                        border: 1px solid #ced4da;
                        border-radius: 4px;
                        box-sizing: border-box;
                    }

                    .formulario input[type="checkbox"] {
                        margin-right: 5px;
                    }

                    label {
                        color: #495057;
                        font-size: 14px;
                    }

                    #bt_registrar {
                        background-color: #007bff;
                        border: none;
                        color: white;
                        padding: 10px 20px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 4px 2px;
                        cursor: pointer;
                        border-radius: 4px;
                    }

                    /* Estilos para dispositivos pequeños */
                    @media screen and (max-width: 600px) {
                        .formulario {
                            width: 90%;
                        }

                        .formulario h2 {
                            margin-top: 10px;
                        }

                        .formulario input[type="text"],
                        .formulario select {
                            width: 100%;
                        }
                    }
                </style>
    </body>

</html>