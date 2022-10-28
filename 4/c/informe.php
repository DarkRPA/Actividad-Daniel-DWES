<?php
    $errado = false;
    $errores = "";
    if(empty($_GET)){
        $errado = true;
        $errores = "<li>No se han recibido datos</li>";
    }else{
        if(empty($_GET["edad"]) || filter_var($_GET["edad"], FILTER_VALIDATE_INT)){
            $errado = true;
            $errores .= "<li>La edad no es valida</li>";
        }

        if(empty($_GET["altura"]) || filter_var($_GET["altura"], FILTER_VALIDATE_INT)){
            $errado = true;
            $errores .= "<li>La altura no es valida</li>";
        }

        if(empty($_GET["peso"]) || filter_var($_GET["peso"], FILTER_VALIDATE_INT)){
            $errado = true;
            $errores .= "<li>El peso no es valido</li>";
        }

        if(empty($_GET["sexo"]) || !($_GET["sexo"] == "M" || $_GET["sexo"] == "F")){
            $errado = true;
            $errores .= "<li>El sexo no es valido</li>";
        }
    }

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Informe de salud</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body>
    <div class="tarjeta min-width-25 max-width-50">
        <h1>Informe de salud</h1>
        <p>Tiene un IMC de: <?php echo $_GET["peso"]/(($_GET["altura"]/100)^2) ?></p>
        <?php
            $modificadorGenero = ($_GET["sexo"] == "M")?5:-161;
            $tmb = ((10*$_GET["peso"])+(6.25*$_GET["altura"])-(5*$_GET["edad"]))+$modificadorGenero;    
                       
        ?>
        <p>Su tasa métabolica es de: <?php echo $tmb?></p>
    </div>
</body>

</html>