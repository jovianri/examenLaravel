<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/estilos.css" />
</head>

<style>
table, th, td {
  border: 1px solid black;
}
</style>

<body>
<?php
include "menu.html";
?>
<div id="content">
<?php

$estadistica = DB::table('estadisticas')->
    select('*')->
    where('jugador', '=', $id)->
    get();

$estadistica = $estadistica[0];
echo '
<table>
<tr>
  <td>Temporada</td>
  <td>' . $estadistica->temporada . '</td>
</tr>
<tr>
  <td>PPP</td>
  <td>' . $estadistica->Puntos_por_partido . '</td>
</tr>
<tr>
  <td>APP</td>
  <td>' . $estadistica->Asistencias_por_partido . '</td>
</tr>
<tr>
  <td>TPP</td>
  <td>' . $estadistica->Tapones_por_partido . '</td>
</tr>
<tr>
  <td>RPP</td>
  <td>' . $estadistica->Rebotes_por_partido . '</td>
</tr>
</table>
';
?>
</div>
</body>
</html>