<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    <li><a href="sala.php"> Salas </a> </li>
                    <li><a href="cama.php"> Cama </a> </li>
		    <li><a href="hospitalizacion.php"> Hospitalizaciones </a> </li>
                    
                </ul>
                
                
            </nav>
            
            <div id="contenido">
                <?php echo $content ?> 
                
            </div>
            
             <div id="barra">
                
                
            </div>
            
            <footer> 
                <p> Grupo 9 Base de Datos 2019 @ Todos los derechos reservados </p>
                 </footer> 
                   
        </div>
           
    </body>
</html>
