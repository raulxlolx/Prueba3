
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

    $sql = "INSERT INTO empleados (id,nombre, apellido, edad, categoria, salario) VALUES ('$id','$nombre', '$apellido', '$edad', '$categoria', '$salario')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo usuario agregado";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idEliminar = $_POST['id_eliminar'];

    $sql = "DELETE FROM empleados WHERE id = '$idEliminar'";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado eliminado correctamente";
    } else {
        echo "Error al eliminar el empleado: " . $conn->error;
    }
}
?>

<h2>Eliminar empleado</h2>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="id_eliminar">Ingrese el ID del empleado a eliminar:</label>
    <input name="id_eliminar" type="number">
    <br>
    <input type="submit" value="Eliminar">
</form>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h2>Editar empleado</h2>
    <label for="id_editar">Ingrese el ID del empleado a editar:</label>
    <input name="id_editar" type="number">
    <br>
    <input type="submit" value="Buscar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idEditar = $_POST['id_editar'];

    
    $sql = "SELECT * FROM empleados WHERE id = '$idEditar'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input name="nombre" type="text" value="<?php echo $row['nombre']; ?>">
            <br>
            <label for="apellido">Apellido:</label>
            <input name="apellido" type="text" value="<?php echo $row['apellido']; ?>">
            <br>
            <label for="edad">Edad:</label>
            <input name="edad" type="number" value="<?php echo $row['edad']; ?>">
            <br>
            <label for="categoria">Categoría:</label>
            <input name="categoria" type="text" value="<?php echo $row['categoria']; ?>">
            <br>
            <label for="salario">Salario:</label>
            <input name="salario" type="number" value="<?php echo $row['salario']; ?>">
            <br>
            <input type="submit" value="Guardar cambios">
        </form>
        <?php
    } else {
        echo "No se encontró ningún empleado con el ID proporcionado";
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $categoria = $_POST['categoria'];
    $salario = $_POST['salario'];

    $sql = "UPDATE empleados SET nombre = '$nombre', apellido = '$apellido', edad = '$edad', categoria = '$categoria', salario = '$salario' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Cambios guardados correctamente";
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }
}
?>
</body>
</html>



</body>
</html>
