<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=hospital user=postgres password=123456")
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = 'SELECT DISTINCT tieneAsignada.refCama, tieneAsignada.refHosp, cama.ubicacion, sala.nombre, hospitalizacion.fecha_asignacion, hospitalizacion.fecha_salida FROM cama
INNER JOIN tieneAsignada ON cama.id = tieneAsignada.refCama
INNER JOIN sala ON cama.ubicacion = sala.numero
INNER JOIN hospitalizacion ON tieneAsignada.refHosp = hospitalizacion.id';

$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());




// Imprimiendo los resultados en HTML
  $row = pg_fetch_array ($result);
  if($row)
	{
	
	
	echo "
	
	<form action='consultar_cama.php' method='get'>
	 <p>Cama: <input type='text' name='cama' class= 'form-control' /></p>
	 <p><input type='submit'class='btn btn btn-primary' /></p>

</form>

	";
	}
	  $row = pg_fetch_array ($result);
  if($row)
	{
	
	
	echo "
	
	<form action='consultar_sala.php' method='get'>
	 <p>Sala: <input type='text' name='sala' class= 'form-control' /></p>
	 <p><input type='submit'class='btn btn btn-primary' /></p>

</form>

	";
	}
	
  $row = pg_fetch_array ($result);
  if($row)
	{
	
	
	echo "
	
	<form action='consultar_hospitalizacion.php' method='get'>
	 <p>Hospitalizacion: <input type='text' name='hospitalizacion' class= 'form-control' /></p>
	 <p><input type='submit'class='btn btn btn-primary' /></p>

</form>

	";
	}

echo "<table class ='table table-striped table-dark'>\n";
	 echo "<thead class='thead-dark'>
		<th>Cama</th>
		<th>Hospitalizacion</th>
		<th>Numero sala</th>
		<th>Nombre sala</th>
		<th>Fecha asignacion</th>
		<th>Fecha salida</th>

	  </thead>
	  <tbody>";
    echo "\t<tr>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr></tbody>\n";
}
echo "</table>\n";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);

?>
