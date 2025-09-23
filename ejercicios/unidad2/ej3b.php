<html>
    <head>
        <title>EJ3B – Conversor Decimal a base 16</title>
    </head>
    <body>
        <?php
        $num=48;
        $base=16;
        $original=$num;
        $convertido="";

        while ($num>0) 
        {
            $resto=$num%$base;

            if($resto<10)
            {
                $digito=chr(ord('0')+$resto);
            }
            else
            {
                $digito=chr(ord('A')+($resto-10));
            }
            $convertido=$digito.$convertido;
            $num=($num-$resto)/$base;
        }

        if($original==0)
        {
            $convertido="0";
        }

        echo "Número $original en base 16 = $convertido<br>"
        ?>
    </body>
</html>