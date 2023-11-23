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

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>

<h2>Usuarios</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Categoría</th>
        <th>Salario</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['categoria']; ?></td>
            <td><?php echo $row['salario']; ?></td>
            <td><a href="?eliminar=<?php echo $row['id'] ?>"></a></td>
            
        </tr>
    <?php } ?>

</table>


<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<h2>Agregar un nuevo usuario</h2>

<label for="nombre">Ingrese La id</label>
<input name="id" type="number" >
<br>
<label for="nombre">Ingrese Su nombre</label>
<input name="nombre" type="text" >
<br>
<label for="apellido">Ingresa su apellido</label>
<input type="text" name="apellido">
<br>
<label for="edad">Ingrese su edad</label>
<input name="edad" type="number">
<br>
<label for="categoria">Ingrese su categoria</label>
<input name="categoria" type="text">
<br>
<label for="salario">Ingrese su salario</label>
<input name="salario" type="number"><br>
<input type="submit" value="Enviar">

</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id= $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $categoria = $_POST['categoria'];
    $salario = $_POST['salario'];

    $sql = "INSERT INTO empleados (id, nombre, apellido, edad, categoria, salario) VALUES ('$id', '$nombre', '$apellido', '$edad', '$categoria', '$salario')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo usuario agregado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['eliminar'])) {
    $ideliminar = $_GET['eliminar'];
    $sqldelete = "DELETE FROM empleados WHERE id = $ideliminar";
    $resultdelete = $conn->query($sqldelete);
    if (!$resultdelete) {
        die("Error al eliminar: " . $conn->error);
    }
}
?>




</body>
</html>
