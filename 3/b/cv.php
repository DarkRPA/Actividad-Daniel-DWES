<?php

//Vamos a obtener todos los datos y a verificarlos
$errado = false;
$motivo_error = "";

if (empty($_POST)) {
    $errado = true;
    $motivo_error .= "<li>No se ha enviado ningún dato</li>";
} else {
    if (empty($_POST["nombre"]) || !preg_match("/^[A-Z][a-z ]{4,}/", $_POST["nombre"])) {
        $errado = true;
        $motivo_error .= "<li>El nombre no es válido</li>";
    }
    if ((empty($_POST["edad"]) || !filter_var($_POST["edad"], FILTER_VALIDATE_INT)) || ($_POST["edad"] < 16 || $_POST["edad"] > 67)) {
        $errado = true;
        $motivo_error .= "<li>La edad no es válida</li>";
    }
    if (!empty($_POST["telefono"]) && !filter_var($_POST["telefono"], FILTER_VALIDATE_INT)) {
        $errado = true;
        $motivo_error .= "<li>El numero de telefono no es valido</li>";
    }
    if (empty($_POST["estudios"])) {
        $errado = true;
        $motivo_error = "<li>No ha elegido ningún estudio</li>";
    }
    if (empty($_POST["imagen"]) || !filter_var($_POST["imagen"], FILTER_VALIDATE_URL)) {
        $errado = true;
        $motivo_error .= "<li>La imagen no es valida</li>";
    }
    if (empty($_POST["formacion"])) {
        $errado = true;
        $motivo_error .= "<li>La experiencia profesional está vacía</li>";
    }
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Usuario</title>
    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body>
    <div class="error tarjeta min-width-50 flex-center <?php echo $errado ? "visible" : "escondido" ?> ">
        <h3>Errores:</h3>
        <ul>
            <?php echo $motivo_error ?>
        </ul>
    </div>
    <div class="tarjeta min-width-50  max-width-50 flex-center flex-rows flex-around <?php echo !$errado ? "visible" : "escondido" ?> ">

        <img src='<?php echo $_POST["imagen"] ?>' alt="Imagen del usuario" class="max-width-25 max-height-25">

        <div class="flex flex-cols">
            <div class="flex flex-cols flex-start">
                <h1><?php echo $_POST["nombre"] ?></h1>
                <h3 class='<?php echo !empty($_POST["web"]) ? "visible" : "escondido"; ?>'><a href="<?php echo !empty($_POST["web"]) ? $_POST["web"] : ""; ?>">Página web</a></h3>
            </div>
            <p class='<?php echo !empty($_POST["telefono"]) ? "visible" : "escondido"; ?>'>Teléfono de contacto: <?php echo !empty($_POST["telefono"]) ? $_POST["telefono"] : ""; ?></p>
            <p>Edad: <?php echo $_POST["edad"]?></p>
            <div class="flex flex-cols">
                <p>Mayores estudios:
                    <?php
                    $estudio;
                    switch ($_POST["estudios"]) {
                        case 0:
                            $estudio = "Sin estudios";
                            break;
                        case 1:
                            $estudio = "Primaria";
                            break;
                        case 2:
                            $estudio = "ESO";
                            break;
                        case 3:
                            $estudio = "F.P.G.M";
                            break;
                        case 4:
                            $estudio = "Bachillerato";
                            break;
                        case 5:
                            $estudio = "F.P.G.S";
                            break;
                        case 6:
                            $estudio = "Titulo universitario";
                            break;
                        default:
                            $estudio = "Estudio no reconocido";
                            break;
                    }
                    echo $estudio;
                    ?>
                </p>
                <p>Idiomas dominantes:</p>
                <ol>
                    <?php 
                        foreach($_POST["idiomas"] as $idioma){
                    ?>
                        <li><?php echo $idioma ?></li>
                    <?php } ?>
                </ol>

                <h1>Experiencia laboral</h1>
                <div>
                    <?php echo $_POST["formacion"]?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>