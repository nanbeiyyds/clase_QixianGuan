<html>
    <head>
        <title>modificar el ejemplo anterior para que calcule la media de los valores que están en 
las posiciones pares y las posiciones impares.</title>
    </head>
    <body>
        <?php
        $impares = array();
        $pares = array();

        $mediaPar;
        $mediaImpar;
        $suma=0;
        $indice=0;
        for ($i=1; $indice <20 ; $i++) 
        { 
            if($i % 2 != 0)
            {
                $suma = $suma + $i;
                $impares[$indice]=array ( "indice" => $indice,
                                        "valor" => $i,
                                        "suma" => $suma);
                $indice++;
            }
            else
            {
                $suma = $suma + $i;
                $pares[$indice]=array ( "indice" => $indice,
                                        "valor" => $i,
                                        "suma" => $suma);
                $indice++;
            }
             echo "La media del impar es : ".($impares[$indice][$suma]%2);
        }
       
        ?>
    </body> 
</html>