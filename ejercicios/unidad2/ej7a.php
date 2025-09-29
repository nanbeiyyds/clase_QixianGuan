<html>
    <head>
        <title>ej7a - crear un array asociativo con los nombres de 5 alumnos y la edad de cada uno de ellos
            a. Mostrar el contenido del array utilizado bucles
            b. Sitúa el puntero en la segunda posición del array y muestra su valores
            c. Avanza una posición y muestra el valores
            d. Coloca el puntero en la última posición y muestra el valores
            e. Ordena el array por orden de edad (de menor a mayor) y muestra la primera posición del array y la última
        </title>
    </head>
    <body>
        <?php
        $alumnos=array(array("alumno1"=>18),
                        array("alumno2"=> 25),
                        array("alumno3"=> 28),
                        array("alumno4"=> 21),
                        array("alumno5"=> 10));
        
        foreach ($alumnos as $alumno) 
        {
            echo "<pre>";
            print_r($alumno);
            echo "</pre>";
        }

        print_r (next($alumnos));

        //Avanza una posicion
        print_r (next($alumnos));

        print_r(end($alumnos));

        usort($alumnos, function($a,$b)
        {
            return reset($a) - reset($b);
        });

        foreach($alumnos as $alumno)
        {
            echo "<pre>";
            print_r($alumno);
            echo "</pre>";
        }

        print_r(reset($alumnos));
        print_r(end($alumnos));
        ?>
    </body>
</html>