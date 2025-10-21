<?php
/* programa php que muestre por pantalla el contenido del fichero alumnos2.txt 
como una tabla HTML. Se mostrará, después de los datos de los alumnos, un mensaje con el número de 
filas que se han leído del fichero. */
$archivo = "alumnos2.txt";
$lineas = file($archivo);
echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Fecha Nac.</th><th>Localidad</th></tr>";
foreach ($lineas as $linea) {
    $campos = explode("##", trim($linea));
    echo "<tr>";
    foreach ($campos as $c) echo "<td>$c</td>";
    echo "</tr>";
}
echo "</table>";
echo "<p>Total alumnos: ".count($lineas)."</p>";
?>