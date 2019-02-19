<div id="header">
    <a href="/"><div class="option">Inicio</div></a>
    <a href="/equipos"><div class="option">Equipo</div></a>
<?php
if (Session::get('logged')) {

?>
    <a href="/logout"><div class="loggedDialogOption">Desconectar</div></a>
<?php
} else {
?>
    <a href="/login"><div class="option" id="login">Login</div></a>
<?php
}
?>
</div>