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
    <img src="/img/escudo.jpg" />  
    <?= $hola = Cookie::get('DWS'); var_dump($hola) ?>
</div>    
</body>
</html>
