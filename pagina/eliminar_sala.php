



<?php
  echo "
<a href='sala.php'>Volver</a>
";
	$dbconn = pg_connect("host=localhost dbname=Hospital user=postgres password=xd123");
	$numero= $_GET["numero"];
	$sql = "DELETE FROM sala WHERE numero= $numero";
	return pg_query( $dbconn, $sql );
	
		  // Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
   
?>