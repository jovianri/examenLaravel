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
        echo $id;

        $jugador = DB::table('jugadores')->
                        select('*')->
                        where('codigo','=',$id)->
                        get();

        $jugador = $jugador[0];
            echo "<table border='1'>";
            echo '<tr>';
            echo "<td>" . $jugador->Nombre . "</td>";
            echo "<td>" . $jugador->Procedencia . "</td>";
            echo "<td><img src='/img/"  . $jugador->foto . "'></td>";
            echo "<td>" . $jugador->Posicion . "</td></tr>";
            
            echo "</table>";
    ?>
</div>
</body>
</html>
