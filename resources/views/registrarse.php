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
        <div id="loginForm">
            <form enctype ="multipart/form-data" name="login" action="/registrarse" method="post">
                <?php echo csrf_field(); ?>
                <input type="text" class="inputAuth" name="user" placeholder="Nombre de usuario" required/>
                <input type="password" class="inputAuth" name="password" placeholder="Password" required/>
                <input type="password" class="inputAuth" name="password2" placeholder="Repite password" required/>
                <input type="file" name="avatar" required/>
                <button id="authButton" type="submit">OK</button>
            </form>
        </div>
    </div>    
</body>
</html>
