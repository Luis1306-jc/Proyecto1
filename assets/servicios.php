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
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">¿Necesitas apoyo en tus unidades de tranporte?</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Te ofrecemos una serie de beneficios y características que pueden mejorar la eficiencia y la efectividad de las operaciones de transporte de mercancías</p>
                    <a class="btn btn-light btn-xl" href="formulario.php">Registralo!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Servicios a tus disposicion</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Optimización de rutas</h3>
                        <p class="text-muted mb-0">Planificar rutas óptimas que minimicen los tiempos de viaje y los costos operativos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Gestion de flotas</h3>
                        <p class="text-muted mb-0">Poder monitorear y administrar la flota de vehículos de transporte de carga, </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Cumplimiento normativo</h3>
                        <p class="text-muted mb-0">Facilita el cumplimiento de las regulaciones y normativas pertinentes, incluyendo los requisitos de seguridad de carga</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Análisis de datos</h3>
                        <p class="text-muted mb-0">Proporciona herramientas de análisis de datos que permiten realizar un seguimiento del rendimiento operativo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/shutterstock_1759048229.png" title="Optimización de rutas">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/shutterstock_1759048229.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Servicio</div>
                            <div class="project-name">Optimización de rutas</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/ima.jpg" title="Gestion de flotas">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/ima.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Servicio</div>
                            <div class="project-name">Gestion de flotas</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/seguimiento-tracking-flota.jpg" title="Seguimiento de la carga">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/seguimiento-tracking-flota.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Servicio</div>
                            <div class="project-name">Seguimiento de la carga</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/analisis-rentabilidad-industria-logistica-transporte-analisis-cadena-suministro-datos-proveedores-transporte-concepto-optimizacion-costos-transporte-ilustracion-aislada-bluevector-c.jpg" title="Análisis de datos">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/analisis-rentabilidad-industria-logistica-transporte-analisis-cadena-suministro-datos-proveedores-transporte-concepto-optimizacion-costos-transporte-ilustracion-aislada-bluevector-c.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Servicio</div>
                            <div class="project-name">Análisis de datos</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/28 septiembre.jpg" title="Cumplimiento normativo">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/28 septiembre.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Servicio</div>
                            <div class="project-name">Cumplimiento normativo</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/como_mejorar_el_servicio_al_cliente-770x400.jpg" title="Mejora al servicio del cliente">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/como_mejorar_el_servicio_al_cliente-770x400.jpg" alt="..." />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50">Servicio</div>
                            <div class="project-name">Mejora al servicio del cliente</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
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
