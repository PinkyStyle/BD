<?php


// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=BD user=postgres password=recajetilla3")
    or die('No se ha podido conectar: ' . pg_last_error());


$query = "SELECT * FROM cama WHERE ID='1'";
  $result = pg_query($dbconn, $query);
  if (!$result) {
	echo "Error while executing the query: " . $query;
	exit;
  }
  $row = pg_fetch_array ($result);
  if($row)
	{
	$ubicacion = $row['ubicacion'];
	$ID = $row['id'];
	
	echo "
	
	<form action='guardar_editar_cama.php' method='get'>
	  <p>ID: <input type='text' name='ID'  value='".$ID."'/></p>
	 <p>Ubicacion: <input type='text' name='ubicacion'  value='".$ubicacion."'/></p>
	 <p><input type='submit' /></p>

</form>

	";



	}

	else


	{

	echo "No results!";

	}
	  
	  
	  // Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);


?>


