<?php
function binario($numero)
{
    return decbin($numero);
}

$numero = $_POST['numero'];
$resultado = binario($numero);

function test_imput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data)
    return $data;
}

echo "<h2>RESULATDO : </h2>";
echo "<p>El numero decimal $numero en binario es $resultado</p>";
?>