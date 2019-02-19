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
    grid-template-areas: "foto foto nombreF nombreA" "foto foto ciudadF ciudadA" "foto foto conferenciaF conferenciaA" "foto foto divisionF divisionA" "jugadores jugadores jugadores jugadores";
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
$equipo = DB::table('equipos')->
    select('*')->
    where('Nombre', '=', $id)->
    get();

$equipo = $equipo[0];
echo ' <div class="grid-container">';
echo '   <div class="foto"><img height="300" src="../images/equipos/' . $equipo->Nombre . '.png" /></div>';
echo '   <div class="nombreF">Nombre</div>';
echo '   <div class="ciudadF">Ciudad</div>';
echo '   <div class="conferenciaF">Conferencia</div>';
echo '   <div class="divisionF">División</div>';
echo '   <div class="jugadores"><a href="jugadores/'. $equipo->Nombre .'">jugadores</a></div>';
echo '   <div class="nombreA">' . $equipo->Nombre . '</div>';
echo '   <div class="ciudadA">' . $equipo->Ciudad . '</div>';
echo '   <div class="conferenciaA">' . $equipo->Conferencia . '</div>';
echo '   <div class="divisionA">' . $equipo->Division . '</div>';
echo ' </div>';
?>
</div>
</body>
</html>