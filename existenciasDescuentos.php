<!DOCTYPE html>
<html>
<head>
  <title>Morango</title>
  <link rel="shortcut icon" href="icono.ico" /> 
</head>
<body>
  <style type="text/css">
    .button{
      background-color: #000; border: none; color: white;
      padding: 25px 60px;
      text-align: center;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer; 
    }
    </style>

  <?php 
    include 'menuAdministrador.php'; 

    $connect = new mysqli("localhost", "root", "", "morango");

    if(mysqli_connect_error()){
     die("Error al conectar: " .mysql_error());
    }

    if(isset($_GET['producto'])){
      $id_producto= $_GET['producto']; 
    }

    if (isset($_POST['id_producto'])) {
      $id_producto= $_POST['id_producto']; 
    }

    $consulta=mysqli_query($connect,"SELECT * FROM producto WHERE id_producto='$id_producto'" );
    $nfilas = mysqli_num_rows ($consulta);

    echo "<form name='formModificar' action='existenciasDescuentos.php' method='POST' align='center'>
          <input type='hidden' name='id_producto' value='$id_producto'><table border=2px>";

   // echo "<form action='modificarProducto.php' method='POST' align='center'>
     //   <table border=2px>";

    echo "<tr>
            <td><b>Imagen del producto</b></td>
            <td><b>Nombre del producto</b></td>
            <td><b>Descripción</b></td>
            <td><b>Precio unitario</b></td>
            <td><b>Existencias</b></td>
          </tr>";

    for($n=0; $n<$nfilas; $n++){
      $filas= mysqli_fetch_array($consulta);

      echo "<tr>
            <td><img src='".$filas['direccion']."' width='200' height='180'></td>
            <td width='260'>".$filas['nombre']."</td>
            <td width='500'>".$filas['descripcion']."</td>
            <td width='100'>".$filas['precio']."</td>
            <td width='370'><b>".$filas['existencias']."</b> en stock. <br>
            Agregar <input type='text' name='agregarEx' size='1'/> productos. <br>
            <input type='submit' class='button' name='Agregar' value='Agregar' align='center'/>
            </td></tr>";

        }

    echo "</table></form>";

    if(isset($_POST['Agregar'])){

      $consulta=mysqli_query($connect,"SELECT existencias FROM producto WHERE id_producto='$id_producto'");
      $nfilas = mysqli_num_rows ($consulta);
      $filas= mysqli_fetch_array($consulta);
      $existencias = $_POST['agregarEx'];
      echo $filas['existencias'];
      echo $existencias."<br>";
      $existencias += $filas['existencias'];
      mysqli_query($connect, "UPDATE producto SET existencias='$existencias' WHERE id_producto=$id_producto");
    }
  ?>

</body>
</html>