<html>
    <head>
        <title>ej5a-definir tres arrays con los siguientes valores
            relativos a módulos que se imparten en el ciclo DAW
        </title>
    </head>
    <body>
        <?php
        $modulo1 = ["Bases Datos","Entorno Desarrollo","Programación"];
        $modulo2 = ["Sistemas Informáticos","FOL","Mecanizado"];
        $modulo3 = ["Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo interfaces","Inglés"];


        $modulos = [];
        foreach ($modulo1 as $modulo) 
        {
            $modulos[] = $modulo;
        }
        foreach ($modulo2 as $modulo) 
        {
            $modulos[] = $modulo;
        }
        foreach ($modulo3 as $modulo) 
        {
            $modulos[] = $modulo;
        }
        echo "Unidos sin funciones<pre>";
        print_r($modulos);
        echo "</pre>";

        $modulosMerge = array_merge($modulo1,$modulo2,$modulo3);
        echo "Unidos con funcion Merge<pre>";
        print_r($modulosMerge); 
        echo "</pre>";

        $modulosPush = $modulo1; // empezamos con el primer array
        array_push($modulosPush, ...$modulo2, ...$modulo3);
        echo "Unidos con funcion push<pre>";
        print_r($modulosPush);
        echo "</pre>";
        
        ?>
    </body>
</html>
