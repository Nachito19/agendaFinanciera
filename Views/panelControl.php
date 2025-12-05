<?php
require '../Views/Templates/header.php';



?>

<body>
    <main>
        <div class="container my-4">
            <h1 class="fw-bold fs-3">Bienvenido de nuevo, <span id="userName">Cargando...</span></h1>
            <p class="text-secondary">Aquí está un resumen de tu actividad financiera</p>
        </div>

        <div class="container pb-4">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Balance Total</h6>
                            <h4 class="fw-bold mb-1" id="totalBalance">$0.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Ingresos</h6>
                            <h4 class="fw-bold mb-1" id="totalIngresos">$0.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Gastos</h6>
                            <h4 class="fw-bold mb-1" id="totalGastos">$0.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Ahorro Neto</h6>
                            <h4 class="fw-bold mb-1" id="totalAhorro">$0.00</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="col-lg-4 mx-auto">
    <div class="card border-0 shadow-sm rounded-4">

        <div class="mb-2">
            <select id="filtroTipo" class="form-select form-select-sm rounded-3">
                <option value="gasto">Gastos</option>
                <option value="ingreso">Ingresos</option>
            </select>
        </div>

        <div class="card-body text-center">
            <h6 class="fw-bold mb-1">Gastos por Categoría</h6>

            <!-- 🔵 CONTENEDOR NUEVO (CENTRADO REAL Y MÁS GRANDE) -->
            <div class="d-flex justify-content-center align-items-center my-3">
                <div style="
                    width: 360px;
                    height: 360px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                ">
                    <canvas id="expensesChart" width="360" height="360"></canvas>
                </div>
            </div>

            <div id="categoriesList" class="mt-3"></div>
        </div>
    </div>
</div>



        <div class="tab-pane fade show active" id="transacciones" role="tabpanel">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-0">Transacciones Recientes</h6>

                    <div class="d-flex justify-content-end mb-2">
                        <button class="btn btn-success btn-sm rounded-3" onclick="exportarExcel()">
                            <i class="bi bi-file-earmark-excel"></i> Exportar a Excel
                        </button>
                    </div>

                    <hr>
                    <div class="list-group" id="transactionsList">
                        <div class="text-center p-3">Cargando datos...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inversiones -->
        <div class="tab-pane fade" id="inversiones" role="tabpanel">
            <div class="alert alert-secondary">Aún no hay datos de inversiones.</div>
        </div>

        <!-- Metas -->
        <div class="tab-pane fade" id="metas" role="tabpanel">
            <div class="alert alert-secondary">Aún no hay metas definidas.</div>
        </div>
        </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-database-compat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        // 1. CONFIGURACIÓN DE FIREBASE
        // Copia esto de tu consola de Firebase (Project Settings -> General -> Web App)

        // Inicializar Firebase
        firebase.initializeApp(firebaseConfig);
        const db = firebase.database();

        // Formateador de moneda (para que se vea como $45,231.89)
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });

        // 2. VERIFICAR USUARIO (Similar a tu comprobarLoggeo)
        auth.onAuthStateChanged((user) => {
            if (user) {
                // Mostrar nombre si está disponible, sino el email
                document.getElementById('userName').innerText = user.displayName || user.email.split('@')[0];
                cargarRegistros(user.uid);
            } else {
                // Si no hay usuario, redirigir al login
                window.location.href = 'login.php';
            }
        });





        // 3. CARGAR DATOS (Equivalente a cargarRegistrosDesdeFirebase + ValueEventListener)
        function cargarRegistros(uid) {


            if (!uid) {
                console.error("Error: UID es nulo o indefinido");
                return;
            }

            //testWrite(uid); // Prueba de escritura
            const dbRef = db.ref('transacciones/' + uid);
            console.log("1. Iniciando escucha en ruta: transacciones/" + uid);

            dbRef.on('value', (snapshot) => {
                let totalIngreso = 0;
                let totalGasto = 0;
                let listaRegistros = [];
                let categoriasGastos = {}; // Para la gráfica

                console.log("Datos recibidos de Firebase:", snapshot.val());

                // Iterar sobre los datos (snapshot.children en Android)
                // Usar solo UN argumento (child) para evitar el error "Expects no more than 1"
                dbRef.on('value', (snapshot) => {

                    let totalIngreso = 0;
                    let totalGasto = 0;
                    let listaRegistros = [];
                    let categoriasGastos = {};
                    let categoriasIngresos = {};
                    const datos = snapshot.val();
                    console.log("Datos recibidos de Firebase:", datos);

                    if (!datos) {
                        console.warn("No hay datos en este UID");
                        return;
                    }

                    // Recorremos correctamente los hijos
                    snapshot.forEach((childSnapshot) => {
                        const reg = childSnapshot.val();

                        if (!reg || !reg.tipo) {
                            console.log("Ignorando registro sin tipo:", reg);
                            return;
                        }

                        listaRegistros.push(reg);
                        console.log("Registro cargado:", reg);

                        const tipo = reg.tipo.toLowerCase();
                        const monto = parseFloat(reg.cantidad);

                        if (tipo === "ingreso") {
                            totalIngreso += monto;

                            //categoriasIngresos
                            if (!categoriasIngresos[reg.categoria]) {
                                categoriasIngresos[reg.categoria] = 0;
                            }
                            categoriasIngresos[reg.categoria] += monto;

                        } else if (tipo === "gasto") {
                            totalGasto += monto;

                            //categoriasIngresos
                            if (!categoriasGastos[reg.categoria]) {
                                categoriasGastos[reg.categoria] = 0;
                            }
                            categoriasGastos[reg.categoria] += monto;
                        }
                    });

                    // 4. ACTUALIZAR TARJETAS (UI)
                    document.getElementById('totalIngresos').innerText = formatter.format(totalIngreso);
                    document.getElementById('totalGastos').innerText = formatter.format(totalGasto);

                    // Balance Total (Ingreso - Gasto)
                    const balance = totalIngreso - totalGasto;
                    document.getElementById('totalBalance').innerText = formatter.format(balance);

                    // Ahorro (en este contexto simple, es lo que queda)
                    document.getElementById('totalAhorro').innerText = formatter.format(balance);

                    document.getElementById("filtroTipo").addEventListener("change", function() {
                        const tipo = this.value;

                        if (tipo === "gasto") {
                            renderizarGrafica(categoriasGastos);
                        } else {
                            renderizarGrafica(categoriasIngresos);
                        }
                    });

                    // 5. ACTUALIZAR LISTA DE TRANSACCIONES (RecyclerView en Android)
                    renderizarLista(listaRegistros);
                    window.todosLosRegistros = listaRegistros; // Guardar para exportación


                    // 6. ACTUALIZAR GRÁFICA (PieChart en Android)
                    renderizarGrafica(categoriasGastos);
                });

            });
        }

        // Renderizar la lista HTML
        function renderizarLista(registros) {
            const contenedor = document.getElementById('transactionsList');
            contenedor.innerHTML = ''; // Limpiar lista anterior

            // Ordenar por fecha (más reciente primero), similar a tu lógica
            registros.sort((a, b) => b.fecha - a.fecha);

            // Tomar solo los últimos 10 para no saturar la vista
            const ultimosRegistros = registros.slice(0, 10);

            ultimosRegistros.forEach(reg => {
                // Determinar color e ícono según tipo
                const esIngreso = reg.tipo === 'ingreso';
                const colorClass = esIngreso ? 'text-success' : 'text-danger';
                const iconClass = esIngreso ? 'bi-arrow-up-right-circle-fill' : 'bi-arrow-down-right-circle-fill';
                const signo = esIngreso ? '+' : '-';

                // Convertir timestamp a fecha legible
                const fecha = new Date(reg.fecha).toLocaleDateString();

                const itemHtml = `
        <div class="list-group-item border-0 rounded-3 mb-2 bg-light d-flex justify-content-between align-items-center">
          <div>
            <i class="bi ${iconClass} ${colorClass} me-2"></i> 
            ${reg.descripcion || reg.categoria}
            <br>
            <small class="text-secondary">${fecha}</small>
          </div>
          <span class="${colorClass} fw-bold">${signo}${formatter.format(reg.cantidad)}</span>
        </div>
      `;
                contenedor.innerHTML += itemHtml;
            });
        }

        // Variable global para destruir la gráfica anterior si existe
        let miGrafica = null;

        function renderizarGrafica(datosCategoria) {
            const ctx = document.getElementById('expensesChart').getContext('2d');
            const listaCategoriasDiv = document.getElementById('categoriesList');

            const labels = Object.keys(datosCategoria);
            const dataValues = Object.values(datosCategoria);

            // Limpiar lista de leyendas manual
            listaCategoriasDiv.innerHTML = '';

            // Colores similares a tu Android App
            const backgroundColors = ['#FF6B6B', '#4ECCA3', '#FFD93D', '#3AB0FF', '#9D4EDD'];

            // Crear gráfica con Chart.js
            if (miGrafica) miGrafica.destroy(); // Destruir anterior para evitar superposiciones

            miGrafica = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        } // Ocultamos leyenda por defecto para hacerla custom
                    }
                }
            });

            // Generar la lista de categorías debajo (UI personalizada)
            labels.forEach((cat, index) => {
                const color = backgroundColors[index % backgroundColors.length];
                const monto = datosCategoria[cat];

                const row = `
        <div class="d-flex justify-content-between align-items-center mb-1">
          <span>
            <span style="display:inline-block;width:10px;height:10px;background-color:${color};border-radius:50%;margin-right:5px;"></span>
            ${cat}
          </span>
          <strong>${formatter.format(monto)}</strong>
        </div>
      `;
                listaCategoriasDiv.innerHTML += row;
            });
        }


        /**
         * Agrega un registro de prueba simple a la base de datos del usuario actual.
         * @param {string} uid El ID del usuario autenticado.
         */
        function testWrite(uid) {
            if (!uid) {
                console.error("Error: UID es requerido para escribir en la base de datos.");
                return;
            }

            const testData = {
                mensaje: "Prueba de Escritura Exitosa",
                fechaPrueba: Date.now(),
                origen: "Web Dashboard Test",
                randomId: Math.random().toString(36).substring(2, 9)
            };

            // Apunta a la ruta: transacciones/{uid}/prueba_conexion
            const dbRef = db.ref('transacciones/' + uid).child('prueba_conexion');

            // Usamos push() para generar un ID único para este registro de prueba
            dbRef.push(testData)
                .then(() => {
                    console.log("✅ DATOS DE PRUEBA GUARDADOS CORRECTAMENTE.");
                    alert("Escritura exitosa. Revisa el nodo /transacciones/" + uid + "/prueba_conexion en tu consola Firebase.");
                })
                .catch((error) => {
                    console.error("❌ ERROR AL ESCRIBIR EN FIREBASE:", error);
                    alert("Error al escribir. Verifica tus reglas de .write.");
                });
        }


        function exportarExcel() {
            if (!window.todosLosRegistros || window.todosLosRegistros.length === 0) {
                alert("No hay datos para exportar.");
                return;
            }

            // Convertir registros a formato compatible con Excel
            const datosExcel = window.todosLosRegistros.map(reg => ({
                Descripción: reg.descripcion || "",
                Categoría: reg.categoria || "",
                Tipo: reg.tipo || "",
                Monto: reg.cantidad,
                Fecha: new Date(reg.fecha).toLocaleString(),
                Cuenta: reg.idCuenta || ""
            }));

            // Crear hoja
            const hoja = XLSX.utils.json_to_sheet(datosExcel);

            // Crear libro
            const libro = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(libro, hoja, "Transacciones");

            // Descargar archivo
            XLSX.writeFile(libro, "transacciones.xlsx");
        }
    </script>
</body>
<?php
    include '../Views/Templates/footer.php';
    ?>