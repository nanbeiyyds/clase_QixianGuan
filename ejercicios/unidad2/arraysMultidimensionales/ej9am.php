<html>
    <head>
        <title>Programa ej9am.php definir una matrices de 3x4:: 
c. La matriz traspuesta (Ayuda: Traspuesta Matriz)
        </title>
    </head>
    <body>
        <?php
        $M=[[1,2,3,4],[5,6,7,8],[9,10,11,12]];
        $Traspuesta = [];
        for ($i=0; $i <4; $i++) 
        { 
           for ($j=0; $j <3; $j++) 
            { 
                $Traspuesta[$i][$j] = $M[$j][$i];
           }
        }
        echo "<pre>";
        print_r($M);
        print_r($Traspuesta);
        echo "</pre>";
        ?>
    </body>
</html>