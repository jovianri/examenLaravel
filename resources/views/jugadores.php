<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/estilos.css" />
</head>
<body>
<?php
    include "menu.php";
?>
<div id="content">
    <?php 
        $jugadores = DB::table('jugadores')->
                     select('*')->
                     where('nombre_equipo','=','Lakers')->
                     take(4)->
                     get();
        foreach($jugadores as $jugador){
            echo "<a href='/jugador/" . $jugador->codigo . "'>";
            echo "<figure class='playersTeam'>";
            echo "<img src='/img/". $jugador->foto . "' />";
            echo "<figcaption>" . $jugador->Nombre . "</figcaption></figure></a>";
        }
    ?>
</div>    
</body>
</html>
