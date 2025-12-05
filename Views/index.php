<?php
require '../Views/Templates/header.php';



?>

<body>


    <!-- Texto central -->
    <div class="text-center my-5">
        <h1 class="text-dark fw-bold display-2">Tu Agenda Financiera</h1>
        <h2 class="text-success fw-bold display-2">Inteligente y Segura</h2>
        <p class="fs-5">Toma el control total de tus finanzas personales con nuestra plataforma todo <br>
            en uno. Organiza hoy, disfruta mañana, Porque cada peso cuenta.</p>
    </div>




    <!-- Toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    🎉 ¡Gracias por unirte! Comienza a organizar tus finanzas ahora mismo.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
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
                    <img src="../Assets/img/grafica.jpg" class="d-block w-100 img-fluid" alt="Grafica" style="height: 400px; object-fit: cover; border-radius: 20px;">
                </div>
                <div class="carousel-item">
                    <img src="../Assets/img/graficos.jpg" class="d-block w-100 img-fluid" alt="Graficos" style="height: 400px; object-fit: cover; border-radius: 20px;">
                </div>
                <div class="carousel-item">
                    <img src="../Assets/img/tablas.jpg" class="d-block w-100 img-fluid" alt="Tablas" style="height: 400px; object-fit: cover; border-radius: 20px;">
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

    <!-- Apartado de Tarjetas -->
    <div class="container mb-5">
        <div class="row g-4">
            <!-- g-4 agrega espacio entre columnas y filas -->
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-calendar-event fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Planificación Inteligente</h5>
                        <p class="card-text">Organiza tus finanzas con calendarios personalizados y recordatorios automáticos para pagos y vencimientos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-arrow-up fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Análisis de Tendencias</h5>
                        <p class="card-text">Visualiza el comportamiento de tus ingresos y gastos con gráficos detallados y proyecciones futuras.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-clock fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Presupuesto Personalizado</h5>
                        <p class="card-text">Crea y gestiona presupuestos por categorías con alertas cuando te acerques a tus límites establecidos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Segundo Apartado de Tarjetas -->
    <div class="container mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-shield fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Seguridad Garantizada</h5>
                        <p class="card-text">Tus datos están protegidos con encriptación de nivel bancario y autenticación de dos factores.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-bell fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Notificaciones Inteligentes</h5>
                        <p class="card-text">Recibe alertas personalizadas sobre pagos pendientes, oportunidades de ahorro y metas alcanzadas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-file-pdf-fill fs-2 text-success mb-3"></i>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Reportes Detallados</h5>
                        <p class="card-text">Genera informes completos de tus finanzas en PDF para análisis profundo o presentaciones.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
    include '../Views/Templates/footer.php';
    ?>