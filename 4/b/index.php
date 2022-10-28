<?php
    $datosRecibidos = false;
    $errado = false;
    $mensajesError = "";

    if(!empty($_POST)){
        $datosRecibidos = true;
        if(empty($_POST["lado"]) || filter_var($_POST["lado"], FILTER_VALIDATE_INT)){
            $errado = true;
            $mensajesError .= "<li>El lado no es correcto</li>";
        }
        if(empty($_POST["alto"]) || filter_var($_POST["alto"], FILTER_VALIDATE_INT)){
            $errado = true;
            $mensajesError .= "<li>El alto no es correcto</li>";
        }

        if(!$errado){
            $datosRecibidos = true;
        }
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Calculo de Perimetro y area</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body>
    <form class="tarjeta min-width-25 max-width-50" method="POST" action="#">
        <h1>Herramienta de cálculo</h1>
        <h4>Introduzca los valores del rectangulo para calcular su area y su perimetro</h4>
        <input type="text" name="lado" placeholder="Tamaño del lado">
        <input type="text" name="alto" placeholder="Tamaño del alto">
        <div class="tarjeta-body">
            <?php if($datosRecibidos){ ?>
                <p>El area calculada es de <?php echo ($_POST["lado"]*$_POST["alto"]) ?></p>
                <p>El perimetro calculado es de <?php echo (2*($_POST["lado"]+$_POST["alto"])) ?></p>
            <?php } ?>
        </div>
        <input type="submit" value="Calcular" class="tarjeta-enviar">
    </form>
</body>

</html>