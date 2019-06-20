<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Estilo.css" />
    </head>
    <body>
        <div id="estructura">
            <div id="banner">
                
                
            </div>
            
            <nav id="navegar">
                <ul id="nav" >
                    <li><a href="index.php"> Home </a> </li>
                    <li><a href="index.php"> Empleados </a> </li>
                    <li><a href="index.php"> Pacientes </a> </li>
                    <li><a href="sala.php"> Salas </a> </li>
                    <li><a href="cama.php"> Cama </a> </li>
                    
                </ul>
                
                
            </nav>
            
            <div id="contenido">
                <?php echo 
    
    //empieza codigo HTML
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
               
                
                
                
                
            </div>
            
             <div id="barra">
                
                
            </div>
            
            <footer> 
                <p> Grupo 9 Base de Datos 2019 @ Todos los derechos reservados </p>
                 </footer> 
                   
        </div>
           
    </body>
</html>
