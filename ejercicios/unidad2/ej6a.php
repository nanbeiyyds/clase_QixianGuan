<html>
    <head>
        <title>ej6a_borrar "Mecanizado" y mostrar inverso</title>
    </head>
    <body>
        <?php
        $modulos = ["Bases Datos","Entorno Desarrollo","Programación"
                    , "Sistemas Informáticos","FOL","Mecanizado",
                    "Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo interfaces","Inglés"];
        $key = array_search("Mecanizado",$modulos);
        if($key == true)
        {
            unset($modulos[$key]);
        }
        $inverso = array_reverse($modulos);
        echo "<pre>"; 
        print_r($inverso);
        echo "</pre><hr>";
        ?>
    </body>
</html>