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
    $temporadas = DB::table('partidos')->
                  select('temporada')->
                  distinct()->
                  orderBy('temporada','asc')->
                  get();
   
?>
<div id="content">
    <form action="#" method="post">
    <?php echo csrf_field(); ?>
        <select name="temporada">
        <?php
        foreach ($temporadas as $temporada) { 
            //var_dump($row);
            echo "<option>" . $temporada->temporada . "</option>";
        }
        ?>
        </select>
        <input type="submit" value="OK">
    </form>
    <?php
    if(Request::has('temporada')) {

        $partidos = DB::table('partidos')->
                    select('*')->
                    where('temporada','=',Request::get('temporada'))->
                    where(function($q){
                        $q->where('equipo_local','=','lakers')->
                        orWhere('equipo_visitante','=','lakers');
                    })->
                    get();

        echo "<table border='1'>";
        foreach ($partidos as $partido) { 
            echo '<tr>';
            echo "<td>" . $partido->temporada . "</td>";                
            echo "<td>" . $partido->equipo_local . "</td>";
            echo "<td>" . $partido->equipo_visitante . "</td>";
            echo "<td>" . $partido->puntos_local . "</td>";
            echo "<td>" . $partido->puntos_visitante . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
</div>    
</body>
</html>

