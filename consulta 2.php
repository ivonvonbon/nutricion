<?php
include_once("conexion.php");

$mensaje = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['id_eliminar'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id_eliminar']);
        $sql = "DELETE FROM citas_nutri WHERE id_cita = '$id'";
        if (mysqli_query($conn, $sql)) {
            $mensaje = "✅ Cita eliminada correctamente.";
        } else {
            $error = "❌ Error al eliminar: " . mysqli_error($conn);
        }
    } else {
        $error = "❌ ID no proporcionado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #2c3e50;
        }

        form {
            margin-bottom: 30px;
        }

        input[type="number"] {
            padding: 8px;
            font-size: 16px;
            margin-right: 10px;
        }

        button {
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .mensaje {
            color: green;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-weight: bold;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 1000px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d1ecf1;
        }

        .volver-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Eliminar Cita Nutricional</h1>

    <?php if ($mensaje): ?><div class="mensaje"><?= $mensaje ?></div><?php endif; ?>
    <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>

    <form method="POST">
        <label for="id_eliminar"><strong>ID de la cita a eliminar:</strong></label>
        <input type="number" name="id_eliminar" required>
        <button type="submit">Eliminar</button>
    </form>

    <h2>Citas registradas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Paciente</th>
            <th>Edad</th>
            <th>Peso</th>
            <th>Plan</th>
            <th>Costo</th>
            <th>Fecha</th>
            <th>Seguimiento</th>
        </tr>
        <?php
        $sql = "SELECT * FROM citas_nutri";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>".$row['id_cita']."</td>";
            echo "<td>".$row['paciente']."</td>";
            echo "<td>".$row['edad']."</td>";
            echo "<td>".$row['peso']."</td>";
            echo "<td>".$row['plan']."</td>";
            echo "<td>$".$row['costo']."</td>";
            echo "<td>".$row['fecha_cita']."</td>";
            echo "<td>".($row['seguimiento'] ? 'Sí' : 'No')."</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <div class="volver-btn">
        <button onclick="location.href='index.php'">Volver al inicio</button>
    </div>
</body>
</html>
