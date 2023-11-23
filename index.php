
<?php
$server = "127.0.0.1";
$user = "base";
$pass = "3216";
$database = "empresa";

$conn = new mysqli($server, $user, $pass, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset('utf8');

$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>

<h2>Usuarios</h2>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Categoría</th>
        <th>Salario</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['categoria']; ?></td>
            <td><?php echo $row['salario']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>
