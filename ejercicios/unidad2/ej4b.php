<html>
    <head>
        <title>EJ4B – Tabla Multiplicar</title>
    </head>
    <body>
        <?php
        $num="8";

        for ($i=1; $i<=$num ; $i++) 
        { 
            $resultado= $i * $num;
            echo "$num * $i = $resultado<br>";
        }

        echo "<hr>";
        echo "<h1>LAS TABLAS COMPLETAS HASTA 9</h1>";
        for ($i=1; $i <= 9 ; $i++) 
        { 
            for ($j=1; $j <= 9 ; $j++)
            { 
                $resultado= $i * $j;
                echo "$i * $j =$resultado<br>";
            }
            echo "<hr>";
        }
        ?>
    </body>
</html>