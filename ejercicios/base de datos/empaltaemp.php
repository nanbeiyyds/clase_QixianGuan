<html>
    <head>
        <title>Alta empleados</title>
    </head>
    <body>
        <h1>Alta empleados</h1>
        <?php
        $servername = "localhost";
        $username   = "root";
        $password   = "rootroot";
        $dbname     = "empleados1n";
        $conn = null;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $dni = strtoupper($_POST["dni"]);
                $nombre = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $fecha_nac = $_POST["fecha_nac"];
                $salario = $_POST["salario"];
                $cod_dpto = $_POST["cod_dpto"];

                if(!preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) 
                {
                    echo "DNI no válido<br><br>";
                } 
                else 
                {
                    $conn->beginTransaction();

                    $sql1 = "INSERT INTO empleado(dni,nombre,apellidos,fecha_nac,salario,cod_dpto)
                             VALUES (:dni,:nombre,:apellidos,:fecha_nac,:salario,:cod_dpto)";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bindParam(':dni', $dni);
                    $stmt1->bindParam(':nombre', $nombre);
                    $stmt1->bindParam(':apellidos', $apellidos);
                    $stmt1->bindParam(':fecha_nac', $fecha_nac);
                    $stmt1->bindParam(':salario', $salario);
                    $stmt1->bindParam(':cod_dpto', $cod_dpto);
                    $stmt1->execute();

                    $sql2 = "INSERT INTO trabaja(dni,cod_dpto,fecha_ini,fecha_fin)
                             VALUES(:dni, :cod_dpto, CURDATE(), NULL)";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bindParam(':dni', $dni);
                    $stmt2->bindParam(':cod_dpto', $cod_dpto);
                    $stmt2->execute();
                    
                    // --- COMMIT ---
                    $conn->commit();
                    echo "<p>Empleado creado correctamente</p><br>";
                }
            }
            $stmt_dptos = $conn->query("SELECT cod_dpto,nombre_dpto FROM departamento");
            $dptos = $stmt_dptos->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) 
        {
            // --- ROLLBACK ---
            if ($conn) 
            {
                $conn->rollBack();
            }
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
        ?>

        <form method="post">
            <label>DNI : </label>
            <input type="text" name="dni" required><br><br>

            <label>Nombre : </label>
            <input type="text" name="nombre" required><br><br>

            <label>Apellidos : </label>
            <input type="text" name="apellidos" required><br><br>

            <label>Fecha nacimiento : </label>
            <input type="date" name="fecha_nac" required><br><br>

            <label>Salario : </label>
            <input type="number" name="salario" required><br><br>

            <label>Departemento : </label>
            <select name="cod_dpto" required>
            <?php
            if (isset($dptos)) 
            {
                foreach($dptos as $fila) 
                {
                    echo "<option value='".$fila['cod_dpto']."'>".$fila['nombre_dpto']."</option>";
                }
            }
            ?>
            </select>
            <br><br>

            <input type="submit" value="Guardar">
        </form>
    </body>
</html>
