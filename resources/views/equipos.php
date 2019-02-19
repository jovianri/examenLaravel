<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/estilos.css" />
</head>
<body>
<?php
include "menu.php";
?>
<div id="content" style="display: flex; flex-wrap: wrap;">
<?php
$equipos = DB::table('equipos')->
    select('*')->
    get();
foreach ($equipos as $equipo) {
    echo "<div>";
    echo "<a href='/equipo/" . $equipo->Nombre . "'>";
    echo "<figure class='playersTeam'>";
    echo "<img src='images/equipos/" . $equipo->Nombre . ".png' />";
    echo "<figcaption>" . $equipo->Nombre . "</figcaption></figure></a>";
    echo "</div>";
}
?>
</div>
</body>
</html>