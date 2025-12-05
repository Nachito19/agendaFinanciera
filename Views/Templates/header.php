<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Principal</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Firebase SDK -->
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>

  <!-- Tu archivo con la configuración e inicialización -->
  <script src="../conexion/firebase-init.js"></script>

</head>

<header class="sticky-top">
  <div class="container-fluid bg-warning">
    <div class="row px-xl-5 align-items-center">

      <!-- Logo -->
      <div class="col-lg-3 d-none d-lg-block">
        <a class="d-flex align-items-center py-3 text-decoration-none">
          <img src="../Assets/img/Logo.png" alt="Logo" style="height: 80px;">
          <h3 class="text-dark fw-bold ms-3 fs-4">DALFICC TECHNOLOGIES</h3>
        </a>
      </div>

      <!-- Menú -->
      <div class="col-lg-9">
        <nav class="navbar navbar-expand-lg navbar-warning bg-warning py-3 py-lg-0">
          <div class="navbar-nav mx-auto">
            <a href="index.php" class="nav-item nav-link ms-2 fw-bold">Inicio</a>
            <a href="servicios.php" class="nav-item nav-link ms-2 fw-bold">Servicios</a>
            <a href="Quien.php" class="nav-item nav-link ms-2 fw-bold">Quiénes Somos</a>
            <a href="contact.php" class="nav-item nav-link ms-2 fw-bold">Contacto</a>
          </div>

          <!-- Controles de sesión -->
          <div class="ms-auto d-flex align-items-center">

            <!-- Invitado -->
            <button id="btnLogin" class="text-light bg-dark rounded-pill px-3 py-2 me-2">
              Iniciar Sesión
            </button>

            <!-- Usuario logueado -->
            <div id="userDropdown" class="dropdown" style="display: none;">
              <a class="btn btn-outline-dark rounded-pill d-flex align-items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 me-2"></i>
                <span id="userNameShort" class="d-none d-md-inline"></span>
              </a>

              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" id="profileLink" href="panelControl.php">Panel de Control</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><button class="dropdown-item text-danger" id="btnLogout">Cerrar sesión</button></li>
              </ul>
            </div>

          </div>
        </nav>
      </div>

    </div>
  </div>
</header>


<!-- ===================== -->
<script>
  const auth = firebase.auth();

  const btnLogin = document.getElementById('btnLogin');
  const userDropdown = document.getElementById('userDropdown');
  const btnLogout = document.getElementById('btnLogout');
  const userNameShort = document.getElementById('userNameShort');
  const profileLink = document.getElementById('profileLink');

  // Detectar cambios en el estado
  auth.onAuthStateChanged(user => {
    if (user) {
      btnLogin.style.display = 'none';
      userDropdown.style.display = 'block';

      const nameToShow = user.displayName 
        ? user.displayName 
        : (user.email ? user.email.split('@')[0] : 'Usuario');

      userNameShort.textContent = nameToShow;
      userNameShort.classList.remove('d-none');

    } else {
      btnLogin.style.display = 'inline-block';
      userDropdown.style.display = 'none';
    }
  });

  // Redirección al login
  btnLogin.addEventListener('click', () => {
    window.location.href = '../Views/Templates/public/Login.php';
  });

  // Cerrar sesión
  btnLogout.addEventListener('click', () => {
    auth.signOut().then(() => {
      window.location.href = '../index.php';
    }).catch(err => {
      console.error("Error al cerrar sesión:", err);
      alert("Ocurrió un error al cerrar la sesión.");
    });
  });
</script>

