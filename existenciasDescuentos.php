

-<!DOCTYPE html>
<html>
<head>
  <title>Morango</title>
</head>
<body>

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



  echo "<form name='formModificar' action='existenciasDescuentos.php' method='POST'>
      <input type='hidden' name='id_producto' value='$id_producto'>
      <table>";

  for($n=0; $n<$nfilas; $n++){
    $filas= mysqli_fetch_array($consulta);


    echo "<tr>
          <td><img src='".$filas['direccion']."' width='100' height='90'></td>
          <td width='600'>".$filas['nombre']."<br>
          Precio".$filas['precio']."<br>
          Descripcion: ".$filas['descripcion']."<br>
          <br> <br>
          Existencias: ".$filas['existencias']."<br>
          Agregar Existencias <input type='text' name='agregarEx' />
          <input type='submit' name='modificar' value='modificar' align='center'/>

          </td>

          <td></td>

        </tr>";

      }

  echo "</table></form>";

  if(isset($_POST['modificar'])){

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