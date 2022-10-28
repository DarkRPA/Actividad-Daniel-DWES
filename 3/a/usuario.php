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
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errado = true;
        $motivo_error .= "<li>El email no es válido</li>";
    }
    if (!empty($_POST["telefono"]) && !filter_var($_POST["telefono"], FILTER_VALIDATE_INT)) {
        $errado = true;
        $motivo_error .= "<li>El numero de telefono no es valido</li>";
    }
    if (empty($_POST["consulta"])) {
        $errado = true;
        $motivo_error .= "<li>La consulta está vacía</li>";
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
    <div class="<?php echo !$errado ? "visible" : "escondido" ?> tarjeta min-width-50 flex-center">
        <p>Buenos días <?php echo $_POST["nombre"] ?></p>
        <p>Su email es <?php echo $_POST["email"] ?></p>
        <p><?php echo empty($_POST["numero"]) ? "No ha introducido ningún numero de telefono" : "Su numero de telefono es" . $_POST["numero"] ?></p>
        <p><?php echo empty($_POST["web"]) ? "No ha introducido ninguna página web" : "Su web es" . $_POST["web"] ?></p>
        <p>El motivo de su consulta es el siguiente</p>
        <pre>
                <?php
                echo $_POST["consulta"];
                ?>
            </pre>
    </div>
</body>

</html>