<html>
    <head>
        <title> EJ5B – Tabla multiplicar con TD<</title>
    </head>
    <body>
        <?php
        $num="8";

        echo "<h1>Tabla del $num</h1>";
        echo "<table border='1'>";

        for ($i=1; $i<=$num ; $i++) 
        { 
            $resultado= $i * $num;
            echo "<tr>";
            echo "<td> $num * $i </td>";
            echo "<td> $resultado</td>";
            echo "<tr>";
        }
        echo "</table>";

        echo "<hr>";
        echo "<table border='1'>";
        echo "<h1>LAS TABLAS COMPLETAS HASTA 9</h1>";
        for ($i=1; $i <= 9 ; $i++) 
        { 
            echo "<tr>";
            for ($j=1; $j <= 9 ; $j++)
            { 

                $resultado= $i * $j;
                echo "<td>$i * $j =$resultado</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>