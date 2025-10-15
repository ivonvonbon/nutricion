<?php
include_once("conexion.php");

$pagina = isset($_GET['pag']) && is_numeric($_GET['pag']) ? $_GET['pag'] : 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Cita Nutricional</title>
</head>
<body>
<div class="caja_popup2"> 
    <form class="contenedor_popup" method="POST">
    <center>
        <table>
            <tr><th colspan="2">Agregar Cita Nutricional</th></tr>

            <tr>
                <td>Paciente:</td>
                <td><input type="text" name="paciente" required></td>
            </tr>
            <tr>
                <td>Edad:</td>
                <td><input type="number" name="edad" min="0" required></td>
            </tr>
            <tr>
                <td>Peso (kg):</td>
                <td><input type="number" step="0.01" name="peso" min="0" required></td>
            </tr>
            <tr>
                <td>Plan nutricional:</td>
                <td><input type="text" name="plan" required></td>
            </tr>
            <tr>
                <td>Costo (MXN):</td>
                <td><input type="number" step="0.01" name="costo" min="0" required></td>
            </tr>
            <tr>
                <td>Fecha de cita:</td>
                <td><input type="date" name="fecha_cita" value="<?php echo date('Y-m-d'); ?>" required></td>
            </tr>
            <tr>
                <td>Seguimiento:</td>
                <td>
                    <select name="seguimiento" required>
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                </td>
            </tr>
            <tr>    
                <td colspan="2" style="text-align: center;">
                    <?php echo "<a href=\"index.php?pag=$pagina\" style='color:red;'>Cancelar</a>"; ?>
                    <input type="submit" name="registrar" value="Registrar" onClick="return confirm('¿Deseas registrar esta cita?');">
                </td>
            </tr>
        </table>
    </center>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['registrar'])) {
    $paciente = mysqli_real_escape_string($conn, $_POST['paciente']);
    $edad = (int) $_POST['edad'];
    $peso = (float) $_POST['peso'];
    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
    $costo = (float) $_POST['costo'];
    $fecha = $_POST['fecha_cita'];
    $seguimiento = (int) $_POST['seguimiento'];

    $query = "INSERT INTO citas_nutri (paciente, edad, peso, plan, costo, fecha_cita, seguimiento)
              VALUES ('$paciente', $edad, $peso, '$plan', $costo, '$fecha', $seguimiento)";

    if (!mysqli_query($conn, $query)) {
        echo "<script>alert('❌ Error al registrar la cita: " . mysqli_error($conn) . "');</script>";
    } else {
        echo "<script>window.location='index.php?pag=$pagina';</script>";
    }
}
?>
