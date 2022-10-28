<?php

$resultado = "";

if (!empty($_POST)) {
    //La partida ha comenzado
    $eleccion = $_POST["seleccion"];
    $resultado = analizarYGenerarResultado($eleccion);
}

function analizarYGenerarResultado($eleccion)
{
    $eleccionMaquina = random_int(1, 5);

    $mensajeVictoria = "El usuario ganó sacando ".getTipo($eleccion)." y la AI perdió con ".getTipo($eleccionMaquina);
    $mensajePerdida = "La IA ganó sacando ".getTipo($eleccionMaquina)." y el usuario perdió con ".getTipo($eleccion);
    $mensajeEmpate = "Ha habido empate, el usuario con ".getTipo($eleccion)." y la AI con ".getTipo($eleccionMaquina);

    $valor = -1;

    if ($eleccion == $eleccionMaquina) {
        $valor = 2;
    } else {
        if (($eleccion == 1 && $eleccionMaquina == 2) || ($eleccion == 1 && $eleccionMaquina == 5)) {
            $valor = 0;
        }
        else if (($eleccion == 2 && $eleccionMaquina == 3) || ($eleccion == 2 && $eleccionMaquina == 4)) {
            $valor = 0;
        }
        else if (($eleccion == 3 && $eleccionMaquina == 5) || ($eleccion == 3 && $eleccionMaquina == 1)) {
            $valor = 0;
        }
        else if (($eleccion == 4 && $eleccionMaquina == 3) || ($eleccion == 4 && $eleccionMaquina == 1)) {
            $valor = 0;
        }
        else if (($eleccion == 5 && $eleccionMaquina == 2) || ($eleccion == 5 && $eleccionMaquina == 4)) {
            $valor = 0;
        }else{
            $valor = 1;
        }
    }

    if($valor == 0){
        return $mensajePerdida;
    }else if($valor == 1){
        return $mensajeVictoria;
    }else if($valor == 2){
        return $mensajeEmpate;
    }
}

function getTipo($eleccion)
{
    $resultado = "";

    switch ($eleccion) {
        case 1:
            $resultado = "Piedra";
            break;
        case 2:
            $resultado = "Papel";
            break;
        case 3:
            $resultado = "Tijeras";
            break;
        case 4:
            $resultado = "Lagarto";
            break;
        case 5:
            $resultado = "Spock";
            break;
    }

    return $resultado;
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>¡Piedra, papel, tijera, lagarto o spock!</title>
    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body>
    <form class="tarjeta max-width-50" action="#" method="POST">
        <h1>¡El juego del año!</h1>
        <h3>Elija entre las siguientes opciones y pulse jugar para probar suerte contra una inteligencia articial desarrollada por Meta y Microsoft</h3>
        <div class="flex flex-cols">
            <input type="radio" name="seleccion" id="" value="1">Piedra
            <input type="radio" name="seleccion" id="" value="2">Papel
            <input type="radio" name="seleccion" id="" value="3">Tijera
            <input type="radio" name="seleccion" id="" value="4">Lagarto
            <input type="radio" name="seleccion" id="" value="5">Spock
        </div>
        <input class="tarjeta-enviar" type="submit" value="Probar suerte">
        <h2>Contestación de la inteligencia artifical:</h2>
        <div><?php echo $resultado; ?></div>
    </form>

</body>

</html>