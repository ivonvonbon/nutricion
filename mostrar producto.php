<?php
include_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Todas las Citas</title>
    <link rel="stylesheet" href="style.css">
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
        <h1>Listado de Citas Nutricionales</h1>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Peso</th>
                    <th>Plan</th>
                    <th>Costo</th>
                    <th>Fecha de Cita</th>
                    <th>Seguimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultado = mysqli_query($conn, "SELECT * FROM citas_nutri");
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    while ($cita = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>".$cita['id_cita']."</td>";
                        echo "<td>".$cita['paciente']."</td>";
                        echo "<td>".$cita['edad']."</td>";
                        echo "<td>".$cita['peso']." kg</td>";
                        echo "<td>".$cita['plan']."</td>";
                        echo "<td>$".$cita['costo']."</td>";
                        echo "<td>".$cita['fecha_cita']."</td>";
                        echo "<td>".($cita['seguimiento'] ? 'Sí' : 'No')."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay citas registradas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <button onclick="location.href='index.php'">Volver al inicio</button>
    </div>
</div>
</body>
</html>
