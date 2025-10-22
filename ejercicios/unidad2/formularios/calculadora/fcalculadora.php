<html>
<head>
    <title>Calculadora en PHP</title>
</head>
<body>
    <h2>Calculadora (formulario y PHP en uno)</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Número 1: </label>
        <input type="number" name="num1" required><br><br>

        <label>Número 2: </label>
        <input type="number" name="num2" required><br><br>

         <p>Selecciona operacion:</p>
            <input type="radio" name="operacion" value="suma" checked> Suma<br>
            <input type="radio" name="operacion" value="resta"> Resta<br>
            <input type="radio" name="operacion" value="multiplicacion"> Multiplicacion<br>
            <input type="radio" name="operacion" value="division"> Division<br><br>

            <input type="submit" value="calculadora">
            <input type="reset" value="borrar">
    </form>

    <?php
    function test_imput($data)
    {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data)
    return $data;}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function suma($a, $b) { return $a + $b; }
        function resta($a, $b) { return $a - $b; }
        function multiplicacion($a, $b) { return $a * $b; }
        function division($a, $b) { return ($b == 0) ? "Error: división por cero" : $a/$b; }

        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operacion = $_POST['operacion'];

        switch ($operacion) {
            case "suma": $resultado = suma($num1, $num2); break;
            case "resta": $resultado = resta($num1, $num2); break;
            case "multiplicacion": $resultado = multiplicacion($num1, $num2); break;
            case "division": $resultado = division($num1, $num2); break;
            default: $resultado = "Operación no válida";
        }

        echo "<h3>Resultado: $resultado</h3>";
    }
    ?>
</body>
</html>
