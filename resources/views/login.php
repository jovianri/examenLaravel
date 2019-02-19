<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/estilos.css" />
</head>
<body>
<?php
include "menu.html";
?>
<div id="content">

<?php
if (isset($_POST['user'])) {
    //comprobar que las contraseñas coinciden
    $pass = $_POST['password'];
    $user = $_POST['user'];
    echo "pass: " . $pass . "////// user" . $user;

}

?>
    <div id="loginForm">
        <form enctype ="multipart/form-data" name="login" action="/login" method="post">
            <input type="text" class="inputAuth" name="user" placeholder="Nombre de usuario" required/>
            <input type="password" class="inputAuth" name="password" placeholder="Password" required/>
            <button id="authButton" type="submit">OK</button>
        </form>
    </div>
</div>
</body>
</html>
