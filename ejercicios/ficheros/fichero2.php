<?php
/* formulario que recoja los datos de alumnos y los almacene un fichero con 
nombre alumnos2.txt (una fila por alumno). Los campos del fichero estarán separados utilizando como 
caracteres delimitadores ## 
Nombre##Apellido1##Apellido2##Fecha Nacimiento##Localidad */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = $_POST['nombre']."##".$_POST['apellido1']."##".$_POST['apellido2']."##".$_POST['fecha']."##".$_POST['localidad']."\n";
    file_put_contents("alumnos2.txt", $datos, FILE_APPEND);
    echo "Alumno guardado en alumnos2.txt";
}
?>
<form method="post">
  Nombre: <input name="nombre"><br>
  Apellido1: <input name="apellido1"><br>
  Apellido2: <input name="apellido2"><br>
  Fecha Nacimiento: <input name="fecha"><br>
  Localidad: <input name="localidad"><br>
  <input type="submit" value="Guardar">
</form>
