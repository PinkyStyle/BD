<?php
$ID =$_GET["ID"];
$ubicacion =$_GET["ubicacion"];

echo "
<a href='cama.php'>Volver</a>
";
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=BD user=postgres password=recajetilla3")
    or die('No se ha podido conectar: ' . pg_last_error());


$query = "UPDATE  cama SET ID= '$ID', ubicacion= $ubicacion  WHERE ID = $ID";
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
