<?php
//fichero1.php
/* formulario que recoja los datos de alumnos y los almacene un fichero con 
nombre alumnos1.txt (una fila por alumno). Los campos del fichero estarán separados por posiciones: 
Nombre: posición 1 a 40 
Apellido1: posición 41 a 81 
Apellido2: posición 82 a 123 
Fecha Nacimiento: posición 124 a 133 
Localidad: posición 134 a 160 */
 function test_imput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data)
    return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombre = str_pad($_POST['nombre'],40);
    $apellido1 = str_pad($_POST['apellido1'],41);
    $apellido2 = str_pad($_POST['apellido2'],42);
    $fecha = str_pad($_POST['fecha'],10);
    $localidad = str_pad($_POST['localidad'],27);

    $linea = $nombre . $apellido1 . $apellido2 . $fecha . $localidad . "\n";
    file_put_contents("alumnos1.txt", $linea, FILE_APPEND);
    echo "Alumno guardado coorectamente";
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nombre: 
    <input name="nombre"><br>
    Apellido1: 
    <input name="apellido1"><br>
    Apellido2: 
    <input name="apellido2"><br>
    Fecha Nacimiento:
     <input name="fecha" placeholder="YYYY-MM-DD"><br>
    Localidad:
    <input name="localidad"><br>
    <input type="submit" value="Guardar">
</form>