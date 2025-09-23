<html>
    <head>
        <title>EJ2B – Conversor Decimal a base n </title>
    </head>
    <body>
        <?php
            $num = 48;
            $base = 8;
            $original = $num;
            $convertido = "";

            while ($num > 0) 
            {
                $resto = $num % $base;             
                $convertido = $resto . $convertido;
                $num = ($num - $resto) / $base;
            }

            if ($original == 0) 
            {
                $convertido = "0";
            }

            echo "Número $original en base $base = $convertido<br>";
        ?>
    </body>
</html>
