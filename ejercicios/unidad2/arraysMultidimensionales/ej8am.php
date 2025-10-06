<html>
    <head>
        <title>Programa ej8am.php definir dos matrices de 3x3 y obtener: 
a. La suma de ambas matrices (Ayuda: Como sumar matrices) 
b. El producto de las mismas (Ayuda: Como multiplicar matrices)
        </title>
    </head>
    <body>
        <?php
        $A = [[1,3,5],[5,33,87],[22,9,11]];
        $B = [[1,67,3],[34,77,2],[5,89,2]];

        $suma = [];
        for ($i=0; $i<3; $i++)
        {
              for ($j=0; $j<3; $j++)
              {
                    $suma[$i][$j] = $A[$i][$j]+$B[$i][$j];
              }
        }

        $producto = [];
        for ($i=0; $i<3; $i++) 
        {
            for ($j=0; $j<3; $j++) 
            {
                $producto[$i][$j]=0;
                for ($k=0; $k<3; $k++) 
                {
                    $producto[$i][$j]+=$A[$i][$k]*$B[$k][$j];
                }
            }
        }
        echo "<pre>";
        print_r($suma);
        print_r($producto);
        echo "</pre>";
        ?>
    </body>
</html>