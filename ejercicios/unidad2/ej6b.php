<html>
    <head>
        <title>EJ6B – Factorial</title>
    </head>
    <body>
        <?php
        $num="5";
        $factorial = 1;
        $cadena="";

        for ($i=$num; $i >= 1 ; $i--) 
        { 
            $factorial *= $i;
            $cadena .= $i;

            if ($i > 1)
            {
                $cadena .="x";
            }
        }
        echo "$num! = $cadena = $factorial";
        ?>
    </body>
</html>