<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión</title>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-analytics-compat.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">

    <div class="container py-5">
        <div class="row align-items-center justify-content-center">

            <!-- Columna Izquierda -->
            <div class="col-md-6 text-center text-md-start mb-5 mb-md-0">
                <div class="mb-4">
                    <i class="bi bi-graph-up-arrow fs-1 text-success"></i>
                    <h2 class="text-black fw-bold display-5 mt-2">
                        Sistema de Agenda Financiera
                    </h2>
                    <p class="fs-5 text-secondary">
                        Accede a tu panel de control personalizado con gráficas en tiempo real, análisis detallados y herramientas avanzadas para tomar mejores decisiones financieras.
                    </p>
                </div>
                <div class="d-flex justify-content-center justify-content-md-start gap-5">
                    <div>
                        <h1 class="text-success fw-bold">+15K</h1>
                        <p class="text-secondary mb-0">Usuarios Activos</p>
                    </div>
                    <div>
                        <h1 class="text-success fw-bold">98%</h1>
                        <p class="text-secondary mb-0">Satisfechos</p>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-5 col-lg-4">
                <div class="card shadow-sm p-4">
                    <h4 class="fw-bold mb-3 text-center">Iniciar Sesión</h4>
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success bg-opacity-10 text-success">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" id="email" class="form-control" placeholder="usuario@ejemplo.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success bg-opacity-10 text-success">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" id="password" class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <input type="checkbox" id="recordar">
                                <label for="recordar" class="small">Recordar mi sesión</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>
                        <button type="button" class="btn btn-danger w-100 mt-3" id="btnVolver">
                            Volver al Inicio
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../conexion/firebase-init.js"></script>
    <script>
        document.getElementById("btnVolver").addEventListener("click", () => {
           window.location.href = "../../../index.php";
        });


        // Inicializar Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();

        document.getElementById("loginForm").addEventListener("submit", async (e) => {
            e.preventDefault();

            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            console.log("Intentando iniciar sesión con:", email);

            try {
                const userCredential = await auth.signInWithEmailAndPassword(email, password);
                console.log("Sesión iniciada:", userCredential.user);
                alert("Inicio de sesión exitoso");
                window.location.href = "../../panelControl.php"; // tu página principal
            } catch (error) {
                console.error(" Error al iniciar sesión:", error);
                alert("" + error.message);
            }
        });
    </script>
</body>

</html>