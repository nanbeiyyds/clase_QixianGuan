<html>
    <head>
        <title>ej1am - crear una matriz de 3*3 con los sucesivos múltiplos
            de 2. Mostrar el contenido de la matriz por fila tal y como 
            se indica en la figura
        </title>
    </head>
    <body>
        <?php
        $matriz = [];
        $num = 2;
        echo "<table border=1>";
        for ($i=0; $i<3; $i++) 
        { 
            echo "<tr>";
            for ($j=0; $j<3; $j++) 
            { 
               $matriz[$i][$j] = $num;
               echo "<td>{$matriz[$i][$j]}</td>";
               $num += 2;
            }
            echo"</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>