<html>
<head>
    <title>Conversión a binario</title>
</head>
<body>
    <h2>Decimal a binario</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Introduce un número decimal: </label>
        <input type="number" name="numero" required>
        <input type="submit" value="Convertir">
    </form>

    <?php
    function test_imput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data)
    return $data;
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function binario($num) {
            return decbin($num);
        }
        $numero = $_POST['numero'];
        echo "<p>El número decimal $numero en binario es: <strong>" . binario($numero) . "</strong></p>";
    }
    ?>
</body>
</html>
