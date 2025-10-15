<?php
include_once("conexion.php");


$totalCitasMostrar = 20;


$sqlCitas = "SELECT id_cita, paciente, fecha_cita, plan, costo FROM citas_nutri WHERE seguimiento = 0 LIMIT " . $totalCitasMostrar;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Pendientes</title>
    <link rel="stylesheet" href="Style.css"> 
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
        </div>
        <div class="content">
            <h1>📅 Citas Pendientes</h1>

            <p><strong>Total de citas mostradas:</strong> <?php echo $totalCitasMostrar; ?></p>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID Cita</th>
                        <th>Paciente</th>
                        <th>Fecha de Cita</th>
                        <th>Plan</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $resultado = mysqli_query($conn, $sqlCitas);
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        while ($cita = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>".$cita['id_cita']."</td>";
                            echo "<td>".$cita['paciente']."</td>";
                            echo "<td>".$cita['fecha_cita']."</td>";
                            echo "<td>".$cita['plan']."</td>";
                            echo "<td>$".$cita['costo']."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay citas pendientes registradas.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <br>
            <button onclick="location.href='Index.php'">Volver al inicio</button>
        </div>
    </div>
</body>
</html>
