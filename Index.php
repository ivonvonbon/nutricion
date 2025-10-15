<?php
include_once("conexion.php");

if ($conn) {
    $conexion_exitosa = true;
} else {
    $conexion_exitosa = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas en colsultorio nutricion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png">
</head>
<body>
    <div class="browser-window">
        <div class="top-bar">
            <div class="circles">
                <div class="circle circle-red"></div>
                <div class="circle circle-yellow"></div>
                <div class="circle circle-green"></div>
            </div>
            <div class="address-bar"></div>
            <div class="right-icons">
                <div class="icon"></div>
            </div>
        </div>
        <div class="content">
            <div class="header">
                <div class="logo">
                    <img src="logo.jpg" alt="Logotipo de tu empresa" style="width:300px; height:200px;">

                    <svg width="30" height="30" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2L1 9L5 12L12 15L19 12L13 9L12 2Z"></path>
                        <path fill="currentColor" d="M12 17L1 21L23 21L12 17Z"></path>
                    </svg>
                    <h1>CITAS NUTRICION</h1>
                </div>
            </div>
            <div class="actions">
                <button onclick="mostrarMensajeConexion()">Conectar BD</button>
                <button onclick="location.href='mostrar producto.php'">Mostrar todos</button>
                <button onclick="location.href='consulta1.php'">Citas Pendientes</button>
                <button onclick="location.href='consulta 2.php'">Eliminar Cita</button>
                <button onclick="location.href='consulta 3.php?pag=1'">Agregar Cita</button>
            </div>
            <div class="status-bar" id="status-bar">
                <span class="status-indicator"></span>
            </div>
            <div id="infoContacto" style="display:none; padding: 10px; background-color: #f0f0f0; border-radius: 5px; margin-bottom: 10px;">
                <p><strong>Dirección:</strong> Calle Principal #123, Ciudad</p>
                <p><strong>Teléfono:</strong> 555-1234</p>
            </div>
            
        </div>
    </div>

    <script>
        var conexionExitosa = <?php echo json_encode($conexion_exitosa); ?>;

        function mostrarMensajeConexion() {
            var statusBar = document.getElementById('status-bar');
            var statusIndicator = document.querySelector('.status-indicator');

            if (conexionExitosa) {
                statusIndicator.textContent = '✔';
                statusIndicator.style.color = 'green';
                statusBar.innerHTML = '<span class="status-indicator">✔</span> BD conectada';
            } else {
                statusIndicator.textContent = '✖';
                statusIndicator.style.color = 'red';
                statusBar.innerHTML = '<span class="status-indicator">✖</span> Error al conectar a la BD';
            }
        }
    </script>
</body>
</html>