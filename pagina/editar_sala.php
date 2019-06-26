<?php
$numero =$_GET["numero"];


// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=BD user=postgres password=recajetilla3")
    or die('No se ha podido conectar: ' . pg_last_error());


$query = "SELECT * FROM sala WHERE numero=$numero";
  $result = pg_query($dbconn, $query);
  if (!$result) {
	echo "Error while executing the query: " . $query;
	exit;
  }
  $row = pg_fetch_array ($result);
  if($row)
	{
	$nombre = $row['nombre'];

	$cant_camas  = $row['cant_camas'];
	
	echo "
	
	<form action='guardar_editar_sala.php' method='get'>
	  <p>Numero: <input type='text' name='numero'  value='".$numero."'/></p>
	 <p>Nombre: <input type='text' name='nombre'  value='".$nombre."'/></p>
	 <p>Camas: <input type='number' name='camas'  value='".$cant_camas."'/></p>
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














