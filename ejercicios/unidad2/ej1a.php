<html>
    <head>
        <title>definir un array y almacenar los 20 primeros números impares</title>
    </head>
    <body>
        <?php
            $impares = array();
            $suma=0;
            $indice=0;
            for ($i=1; $indice <20 ; $i++) 
            { 
                if($i % 2 != 0)
                {
                    $suma = $suma + $i;
                    $impares[$indice]=array ( "indice" => $indice,
                                            "valor" => $i,
                                            "suma" => $suma);
                    $indice++;
                }
            }
            
            echo "<table border='1'>";
            echo "<tr><th>INDICES</th><th>VALOR</th><th>SUMA</th></tr>";
            foreach($impares as $fila)
            {
                echo "<tr>";
                echo "<td>".$fila['indice']."</td>";
                echo "<td>".$fila['valor']."</td>";
                echo "<td>".$fila['suma']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body> 
</html>