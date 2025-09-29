<html>
    <head>
        <title>ej8a - crear un array asociativo con los nombres de 
            5 alumnos y la nota de cada uno de ellos en Bases Datos
            a. mostrar el alumno con mayor nota;
            b. mostrar el alumno con menor nota;
            c. Media notas obtenidas por los alumnos;</title>
    </head>
    <body>
        <?php
        $alumnos = array(array("alumno1" => 7),
                        array("alumno2" => 8),
                        array("alumno3" => 3),
                        array("alumno4" => 2),
                        array("alumno5" => 6));

        usort($alumnos, function($a,$b)
        {
            return reset($a) - reset($b);
        });
        //con mayor nota
        echo "<h2>el alumno con mayor nota</h2><pre>";
        print_r(end($alumnos));
        echo "</pre>";
        //con menor nota
        echo "<h2>el alumno con menor nota</h2><pre>";
        print_r(reset($alumnos));
        echo "</pre>";
        //media notas

        $total = 0;
        foreach($alumnos as $alumno)
        {
            $total += reset($alumno);
        }
        echo "la nota media es : ".($total/2);
        ?>
    </body>
</html>