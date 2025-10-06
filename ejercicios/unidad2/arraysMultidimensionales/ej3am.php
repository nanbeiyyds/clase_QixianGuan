<html>
    <head>
        <title>ej3am - crear una matriz 3*5 mostrar por pantalla imprimiendo
            los elementos por fila en primer lugar y a continuación por columnas
            (1,1)=(elemento pos 1,1) - (1,2) = (elementos pos 1,2)...
            (1,1)=(elemento pos 1,1) - (2,1) = (elementos pos 2,1)...
        </title>
    </head>
    <body>
        <?php
        $matriz = [
            [2,4,6,9,7],
            [8,10,12,1,12],
            [14,16,88,3,15]
        ];

        foreach ($matriz as $fila) 
        {
            echo implode(" ",$fila)."<br>";
        }

        for($i=0;$i<5;$i++)
        {
            for ($j=0; $j<3; $j++) 
            { 
              echo "({$j},{$i})=".$matriz[$j][$i]." ";
            }
        }
        ?>
    </body>
</html>