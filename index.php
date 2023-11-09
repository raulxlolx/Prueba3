<?php 


include("users.php");
$sql="SELECT * FROM empleados";
$result=mysqli_query($conn,$sql) or die (mysqli_error($conn));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <th colspan="3"><h2>Usuarios</h2></th>
        <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>categoria</th>
        <th>salario</th>
        </tr>

        <?php while($row=mysqli_fetch_array($result)){?>
        <tr>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['apellido'];?></td>
        <td><?php echo $row['edad'];?></td>
        <td><?php echo $row['categoria'];?></td>
        <td><?php echo $row['salario'];?></td>
        </tr>
        <?php }?>
    </table>
</body>
</html>