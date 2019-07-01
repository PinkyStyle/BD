



<?php
  echo "
<a href='cama.php'>Volver</a>
";
	$dbconn = pg_connect("host=localhost dbname=BD user=postgres password=recajetilla3");
	$id= $_GET["ID"];
	$sql = "DELETE FROM cama WHERE id= $id";
	return pg_query( $dbconn, $sql );
	
		  // Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>