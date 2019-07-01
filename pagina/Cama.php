<?php 

    $dbconn = pg_connect("host=localhost dbname=BD user=postgres password=recajetilla3")
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = 'SELECT * FROM cama';
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Imprimiendo los resultados en HTML
echo "<table>\n";
	 echo "<tr>
		<th>ID</th>
		<th>Ubicacion</th>		
		<th></th>
		<th></th>
		<th></th>
	  </tr>";
    echo "\t<tr>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
	echo "<td class='contact-edit'>
		<form action='editar_cama.php?ID=". $line['id'] ."' method='post'>
			<input type='hidden' name='ID' value=".  $line['id'] .">
			<input type='submit' name='submit' value='Edit'>
		</form>
	</td>";
	echo "<td class='contact-delete'>
		<form action='eliminar_cama.php?ID=". $line['id'] ."' method='post'>
			<input type='hidden' name='ID' value=".  $line['id'] .">
			<input type='submit' name='submit' value='Delete'>
		</form>
	</td>";
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
echo "
<a href='nueva_cama.php'>Insertar cama</a>
";

 ?> 
               
                
                
           