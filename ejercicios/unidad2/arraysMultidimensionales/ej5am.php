<html>
    <head>
        <title>ej5am - definir una matriz de 5*3 tal que en cada posición contenga el número
            que resulta de sumar el número que identifica la columna con el número que identifica la fila 
            del mismo, imprimir los elementos de la matriz por columnas.
        </title>
    </head>
    <body>
        <?php
        $matriz=[];
        for($i=0; $i<5;$i++)
        {
            for($j=0;$j<3;$j++)
            {
                $matriz[$i][$j] = $i+$j;
                echo $matriz[$i][$j];
            }
            echo "<br>";
        }
        echo "<hr>";
        ?>
    </body>
</html>