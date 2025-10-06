<?php
function binario($numero)
{
    return decbin($numero);
}

$numero = $_POST['numero'];
$resultado = binario($numero);

echo "<h2>RESULATDO : </h2>";
echo "<p>El numero decimal $numero en binario es $resultado</p>";
?>