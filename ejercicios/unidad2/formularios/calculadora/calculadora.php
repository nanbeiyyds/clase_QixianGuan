<?php
function suma ($a,$b)
{
    return $a + $b;
}
function resta ($a,$b)
{
    return $a - $b;
}
function multiplicacion ($a,$b)
{
    return $a * $b;
}
function division ($a,$b)
{
    if ($b == 0)
    {
        return "Erros: división po cero";
    }
    return $a / $b;
}

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operacion = $_POST['operacion'];

switch($operacion)
{
    case "suma":
        $resultado = suma($num1,$num2);
        break;
    case "resta":
        $resultado = resta($num1,$num2);
        break;
    case "multiplicacion":
        $resultado = multiplicacion($num1,$num2);
        break;
    case "division":
        $resultado = division($num1,$num2);
        break;
    default:
        $resultado = "operacion no valida";
}

echo "<h2>Resultado:</h2>";
echo "<p>La $operacion de $num1 y $num2 es : $resultado </p>";
?>