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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Proyecto Alejandro</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
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
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h2 class="text-white font-weight-bold">Protección, prevención y tecnología para el transporte de
                        carga</h2>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Te brindamos protección al transporte de carga con las mejores
                        coberturas, para las unidades y los colaboradores</p>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Control total sobre tu flota</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">"Simplifica, gestiona y ahorra con nuestro innovador sistema de gestión de transporte de carga.</p>
                    <img src="https://img.freepik.com/foto-gratis/imagen-camion-blanco-realista-sobre-fondo-blanco_125540-4543.jpg" alt="">
                    <br><br><a class="btn btn-light btn-xl" href="servicios.php">Servicios</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Al registrarte..</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <p class="text-muted mb-0"> Nuestro sistema de gestión de transporte de carga lo hace posible</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <p class="text-muted mb-0">Lleva tu logística al siguiente nivel con nuestro sistema de gestión de unidades y operadores de transporte de carga. ¡Ahorra tiempo, dinero y preocupaciones</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <p class="text-muted mb-0">Simplifica tus operaciones, maximiza tus resultados. Con nuestro sistema de gestión de transporte de carga, el éxito está garantizado</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <p class="text-muted mb-0">Descubre el poder de nuestro sistema de gestión de transporte de carga y lleva tu unidad a otro nivel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">¿Que esperas?registra tu unidad</h2>
            <a class="btn btn-light btn-xl" href="formulario.php">Registrar unidad</a>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Elaborado por: </div>
        </div>
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Christian Alejandro Ortiz Sanchez / Raul Verdin Zuñiga / Grupo
                DSM502</div>
        </div>
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted"><img src="https://becas.news/wp-content/uploads/descarga-4-1.jpg"
                    width="45%"></div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>