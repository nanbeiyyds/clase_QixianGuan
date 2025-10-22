<?php
function base ($numero,$base)
{
    return base_convert($numero,10,$base);
}

$numero = $_POST['numero'];
$base = $_POST['base'];
$resultado = base($numero, $base);

function test_imput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data)
    return $data;
}

echo "<h2>RESULTADO</h2>";
echo "<p>El numero $numero en base $base es : $resultado</p>";
?>