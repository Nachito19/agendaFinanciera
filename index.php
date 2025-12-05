<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

    <!-- Header -->
    <header class="sticky-top">
        <div class="container-fluid bg-warning">
            <div class="row px-xl-5 align-items-center">

                <!-- Logo -->
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="d-flex align-items-center py-3 text-decoration-none">
                        <img src="Assets/img/Logo.png" alt="Logo" style="height: 80px;">
                        <h3 class="text-dark fw-bold ms-3 fs-4 fw-bold">DALFICC TECHNOLOGIES</h3>
                    </a>
                </div>

                <!-- Menú -->
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg navbar-warning bg-warning py-3 py-lg-0">

                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link ms-2 fw-bold">Inicio</a>
                            <a href="Views/servicios.php" class="nav-item nav-link ms-2 fw-bold">Servicios</a>
                            <a href="Views/Quien.php" class="nav-item nav-link ms-2 fw-bold">Quiénes Somos</a>
                            <a href="Views/contact.php" class="nav-item nav-link ms-2 fw-bold">Contacto</a>
                        </div>

                        <!-- Botón de Login -->
                        <div class="ms-auto">
                            <button id="btnLogin" class="text-light bg-dark rounded-pill px-3 py-2">
                                Iniciar Sesión
                            </button>
                        </div>

                        <!-- Script del botón -->
                        <script>
                            const loginBtn = document.getElementById('btnLogin');

                            if (loginBtn) {
                                loginBtn.addEventListener('click', () => {
                                    // Redirige al login
                                    window.location.href = 'Views/Templates/public/Login.php';
                                });
                            }
                        </script>

                    </nav>
                </div>
            </div>
        </div>
    </header>


    <!-- Texto central -->
    <div class="text-center my-5">
        <h1 class="text-dark fw-bold display-2">Tu Agenda Financiera</h1>
        <h2 class="text-success fw-bold display-2">Inteligente y Segura</h2>
        <p class="fs-5">Toma el control total de tus finanzas personales con nuestra plataforma todo <br>
            en uno. Organiza hoy, disfruta mañana, Porque cada peso cuenta.</p>
    </div>

    <!-- Carrusel -->
    <div class="container my-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Assets/img/grafica.jpg" class="d-block w-100 img-fluid"
                        alt="Grafica" style="height: 400px; object-fit: cover; border-radius: 20px;">
                </div>
                <div class="carousel-item">
                    <img src="Assets/img/graficos.jpg" class="d-block w-100 img-fluid"
                        alt="Graficos" style="height: 400px; object-fit: cover; border-radius: 20px;">
                </div>
                <div class="carousel-item">
                    <img src="Assets/img/tablas.jpg" class="d-block w-100 img-fluid"
                        alt="Tablas" style="height: 400px; object-fit: cover; border-radius: 20px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Texto Central de Abajo -->
    <div class="text-center my-5">
        <h1 class="display-5 fw-bold">Funciones Diseñadas para Ti</h1>
        <p class="fs-5">Herramientas poderosas que simplifican la gestión de tus finanzas personales</p>
    </div>

    <!-- Tarjetas -->
    <div class="container mb-5">
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-calendar-event fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Planificación Inteligente</h5>
                        <p class="card-text">Organiza tus finanzas con calendarios personalizados y recordatorios automáticos.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-arrow-up fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Análisis de Tendencias</h5>
                        <p class="card-text">Visualiza el comportamiento de tus ingresos y gastos con gráficos detallados.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-clock fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Presupuesto Personalizado</h5>
                        <p class="card-text">Crea y gestiona presupuestos por categorías con alertas inteligentes.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer -->
    <footer class="container-fluid bg-secondary text-secondary pt-5">
        <div class="container">
            <div class="row">

                <!-- Contacto -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <h5 class="text-dark text-uppercase mb-4">Contacto</h5>
                    <p class="text-dark"><strong>Sistema De Agenda Financiera S.A. de C.V.</strong></p>
                    <p class="text-dark"><i class="fa fa-map-marker-alt text-dark mr-2"></i>Tercera Nte.Pte, Rayon, Chiapas</p>
                    <p class="text-dark"><i class="fa fa-envelope text-dark mr-2"></i>dalficctechnologies@gmail.com</p>
                    <p class="text-dark"><i class="fa fa-phone-alt text-dark mr-2"></i>(+52) 961 231 0580</p>
                </div>

                <!-- Enlaces -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <h5 class="text-dark text-uppercase mb-4">Enlaces Rápidos</h5>
                    <div class="d-flex flex-column">
                        <a href="index.php" class="text-dark mb-2">Inicio</a>
                        <a href="Views/servicios.php" class="text-dark mb-2">Productos/Servicios</a>
                        <a href="Views/Quien.php" class="text-dark mb-2">Quiénes Somos</a>
                        <a href="Views/contact.php" class="text-dark mb-2">Contacto</a>
                    </div>
                </div>

                <!-- Redes -->
                <div class="col-lg-4 col-md-12 mb-5">
                    <h5 class="text-dark text-uppercase mb-4">Síguenos</h5>
                    <a class="btn btn-primary btn-square" href="https://www.facebook.com/profile.php?id=61583603061580">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>

            </div>
        </div>
    </footer>

</body>

</html>
