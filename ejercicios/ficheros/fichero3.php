<?php
/*programa php que muestre por pantalla el contenido del fichero alumnos1.txt 
como una tabla HTML. Se mostrará, después de los datos de los alumnos, un mensaje con el número de 
filas que se han leído del fichero.  */
 function test_imput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data)
    return $data;
}
$archivo = "alumnos1.txt";
$lineas = file($archivo);
echo "<table border='1'>";
echo "<tr><th>Nombre</th>
    <th>Apellido1</th>
    <th>Apellido2</th>
    <th>Fecha Nacionalidad</th>
    <th>Localidad</th></tr>";
foreach ($lineas as $linea) 
{
    echo "<tr>";
    echo "<td>".trim(substr($linea,0,40))."</td>";
    echo "<td>".trim(substr($linea,40,41))."</td>";
    echo "<td>".trim(substr($linea,81,42))."</td>";
    echo "<td>".trim(substr($linea,123,10))."</td>";
    echo "<td>".trim(substr($linea,133))."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<p>Total alumnos: ".count($lineas)."</p>";
?>
