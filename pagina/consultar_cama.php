<?php


$cama = $_GET["cama"];
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=hospital user=postgres password=123456")
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = 'SELECT DISTINCT tieneAsignada.refCama, tieneAsignada.refHosp, cama.ubicacion, sala.nombre, hospitalizacion.fecha_asignacion, hospitalizacion.fecha_salida FROM cama
INNER JOIN tieneAsignada ON cama.id = tieneAsignada.refCama  
INNER JOIN sala ON cama.ubicacion = sala.numero
INNER JOIN hospitalizacion ON tieneAsignada.refHosp = hospitalizacion.id
WHERE cama.id = '.$cama;

$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());




// Imprimiendo los resultados en HTML


echo "<table>\n";
	 echo "<tr>
		<th>Cama</th>
		<th>Hopsitalizacion</th>
		<th>Numero sala</th>
		<th>Nombre sala</th>
		<th>Fecha asignacion</th>
		<th>Fecha salida</th>

	  </tr>";
    echo "\t<tr>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);

?>