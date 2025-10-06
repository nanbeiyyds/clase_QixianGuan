<html>
    <head>
        <title>ej6am - definir una matriz de 3*3 con números aleatorios.
            Generar un array que contenga los valores máximos de cada fila 
            y otro que contenga los promedios de la mismas.
            Mostrar el contenido de ambos arrays por pantalla.
        </title>
    </head>
    <body>
        <?php
        $maximo = [];
        $aleatorio = [];
        $promedios = [];
        for ($i=0; $i <3 ; $i++) 
        { 
           $suma =0;
           for ($j=0; $j <3 ; $j++) 
            {
                $aleatorio[$i][$j]= rand(1,100);
                $suma += $aleatorio[$i][$j];
           }
           $maximo[$i] = max($aleatorio[$i]);
           $promedios[$i] = $suma/3;
        }
        echo "<pre>";
        print_r($aleatorio);
        echo "Maximos : ".print_r($maximo);
        echo "Promedios : ".print_r($promedios);
        echo "</pre>";
        ?>
    </body>
</html>