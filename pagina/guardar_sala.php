<?php
$numero =$_GET["numero"];
$nombre =$_GET["nombre"];
$camas = $_GET["camas"];

echo "
<a href='sala.php'>Volver</a>
";
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=Hospital user=postgres password=xd123")
    or die('No se ha podido conectar: ' . pg_last_error());


$query = "INSERT INTO sala (numero,nombre, cant_camas) VALUES ($numero,'$nombre', $camas)";
      $result = pg_query($dbconn, $query);
      if (!$result) {
        echo "Error while executing the query: " . $query;
        exit;
      }
	  
	  // Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);


?>

