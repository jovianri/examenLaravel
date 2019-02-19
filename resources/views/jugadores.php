<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/estilos.css" />
</head>
<body>
<?php
include "menu.html";
?>
<div id="content">
    <div id="players">
        <?php

$jugadores = DB::table('jugadores')->
    select('*')->
    where('Nombre_equipo', '=', $id)->
    get();

foreach ($jugadores as $jugador) {
    echo "<a href='/jugador/" . $jugador->codigo . "'>";
    echo "<figure class='playersTeam'>";
    $nombreJugador = str_replace(" ", "_", $jugador->Nombre);
    $nombreJugador = strtolower($nombreJugador);
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/jugadores/" . $nombreJugador . ".jpg")) {
        echo "<img src='../../images/jugadores/" . $nombreJugador . ".jpg' />";
    } else {
        echo "<img src='../../images/player.png'/>";
    }
    echo "<figcaption>" . $jugador->Nombre . "</figcaption></figure></a>";
}
?>
    </div>
</div>
</body>
</html>