<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/estilos.css" />
</head>

<style>
.grid-container {
    border: 1px solid black;
    display: grid;
    grid-template-areas: 
    "foto foto nombreF nombreA"
    "foto foto ciudadF ciudadA" 
    "foto foto conferenciaF conferenciaA" 
    "foto foto divisionF divisionA" 
    "jugadores jugadores jugadores jugadores";
}
.grid-container > *{
    border: 1px solid black;
    margin: 3px;
}

.foto { grid-area: foto; }

.nombreF { grid-area: nombreF; }

.ciudadF { grid-area: ciudadF; }

.conferenciaF { grid-area: conferenciaF; }

.divisionF { grid-area: divisionF; }

.jugadores { grid-area: jugadores; }

.nombreA { grid-area: nombreA; }

.ciudadA { grid-area: ciudadA; }

.conferenciaA { grid-area: conferenciaA; }

.divisionA { grid-area: divisionA; }
</style>

<body>
<?php
include "menu.html";
?>
<div id="content">
<?php

$jugador = DB::table('jugadores')->
    select('*')->
    where('codigo', '=', $id)->
    get();

$jugador = $jugador[0];

echo ' <div class="grid-container">';
$nombreJugador = str_replace(" ", "_", $jugador->Nombre);
$nombreJugador = strtolower($nombreJugador);
if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/jugadores/" . $nombreJugador . ".jpg")) {
    echo "<div class='foto'><img height='300' src='../../images/jugadores/" . $nombreJugador . ".jpg' /></div>";
} else {
    echo "<div class='foto'><img height='300' src='../../images/player.png'/></div>";
}
echo '   <div class="nombreF">Nombre</div>';
echo '   <div class="ciudadF">Procedencia</div>';
echo '   <div class="conferenciaF">Altura</div>';
echo '   <div class="divisionF">Peso</div>';
echo '   <div class="jugadores"><a href="estadisticas/' . $jugador->codigo . '">estadisticas</a></div>';
echo '   <div class="nombreA">' . $jugador->Nombre . '</div>';
echo '   <div class="ciudadA">' . $jugador->Procedencia . '</div>';
echo '   <div class="conferenciaA">' . $jugador->Altura . '</div>';
echo '   <div class="divisionA">' . $jugador->Peso . '</div>';
echo ' </div>';

?>
</div>
</body>
</html>