<?php
function crearBaraja()
{
    $palos = ["c", "d", "p", "t"];
    $valores = ["A", "2", "3", "4", "5", "6", "7", "J", "Q", "K"];
    $baraja = [];

    foreach ($valores as $valor) 
    {
        foreach ($palos as $palo)
        {
            $baraja[] = $valor . $palo;
        }
    }
    return $baraja;
}

function repartirCartas($jugadores, $numCarta)
{
    $baraja = crearBaraja();
    shuffle($baraja);

    $indice = 0;

    foreach ($jugadores as $i => $jugador) 
    {
        $cartasJugador = [];

        for ($j = 0; $j < $numCarta; $j++)
        {
            $cartasJugador[] = $baraja[$indice];
            $indice++;
        }

        $jugadores[$i]["cartas"] = $cartasJugador;
        $jugadores[$i]["puntos"] = calcular($cartasJugador);
    }

    return $jugadores;
}

function calcular($cartas)
{
    $puntos = 0;
    foreach ($cartas as $carta) 
    {
        $valor = substr($carta, 0, -1);
        if ($valor == "A") 
        {
            $puntos += 1;
        }
        elseif ($valor == "J" || $valor == "Q" || $valor == "K") 
        {
            $puntos += 0.5;
        }
        else 
        {
            $puntos += intval($valor);
        }
    }
    return $puntos;
}
function ganador()
{

}
function apuesto()
{
    
}
function imprimirCartas($jugadoresCartas)
{
    foreach ($jugadoresCartas as $jugador) {
        $nombre = $jugador["nombre"];
        $cartas = $jugador["cartas"];
        $puntos = $jugador["puntos"];

        echo "<h4>Nombre : $nombre</h4>";
        echo "Cartas : " . implode(", ", $cartas) . "<br>";
        echo "Puntos : $puntos<br><br>";
    }
}
?>
