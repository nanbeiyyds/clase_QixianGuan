<?php
    $jugador1 = $_POST["nombre1"];
    $jugador2 = $_POST["nombre2"];
    $jugador3 = $_POST["nombre3"];
    $jugador4 = $_POST["nombre4"];

    $numCartas = $_POST["numcartas"];
    $apuesta = $_POST["apuesta"];
    include 'media7fun.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") //se ejecuta al pulsar el boton
    {
        //el array de los jugadores
        $jugadores = [
            ["nombre" => $jugador1],
            ["nombre" => $jugador2],
            ["nombre" => $jugador3],
            ["nombre" => $jugador4]
        ];

        //repartir cartas
        $Jugadores = repartirCartas($jugadores,$numCartas);

        echo "<h1>Resultado del juego</h1>";
        echo "<p>Cada jugador apostó :</p>";

        imprimirCartas($Jugadores);
    }

    function test_imput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
