<html>
    <head>
        <title>ej1b – Conversor decimal a binario</title>
        <!--Transformar un número decimal a binario usando bucles (no se podrá utiliza la 
función decbin)-->
    </head>
    <body>
        <?php
        $numero = 168;
        function decimalABinario($numero) 
        {
            $binario = '';
            while ($numero > 0) 
            {
                $binario = ($numero % 2) . $binario; 
                $numero = intdiv($numero, 2); 
            }
            return $binario ?: '0';
        }
        echo "El número decimal $numero en binario es: " . decimalABinario($numero);

        ?>
    </body>
</html>