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
        $dbname     = "empleados";
        $conn = null;
        $dptos = [];

        function limpiarCampo($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function datos()
        {
            return [
            'dni' => strtoupper(limpiarCampo($_POST["dni"])),
            'nombre'=> limpiarCampo($_POST["nombre"]),
            'apellidos' => limpiarCampo($_POST["apellidos"]),
            'fecha_nac' => limpiarCampo($_POST["fecha_nac"]),
            'salario' => limpiarCampo($_POST["salario"]),
            'cod_dpto' => limpiarCampo($_POST["cod_dpto"])
            ];
        }

        function insertar($conn,$datos)
        {
            $sql1 = "INSERT INTO empleado(dni,nombre,apellidos,fecha_nac,salario)
                    VALUES (:dni,:nombre,:apellidos,:fecha_nac,:salario)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bindParam(':dni',$datos['dni']);
            $stmt1->bindParam(':nombre',$datos['nombre']);
            $stmt1->bindParam(':apellidos',$datos['apellidos']);
            $stmt1->bindParam(':fecha_nac',$datos['fecha_nac']);
            $stmt1->bindParam(':salario',$datos['salario']);
            $stmt1->execute();
        }

        function departamentoInicial($conn,$dni,$cod_dpto)
        {
            $sql2 = "INSERT INTO emple_depart(dni,cod_dpto,fecha_ini,fecha_fin)
                    VALUES(:dni, :cod_dpto, CURDATE(), NULL)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(':dni', $dni);
            $stmt2->bindParam(':cod_dpto', $cod_dpto);
            $stmt2->execute();
        }

        function obtenerDepartamento($conn)
        {
            $stmt_dptos = $conn->query("SELECT cod_dpto,nombre_dpto FROM departamento");
            return $stmt_dptos->fetchAll(PDO::FETCH_ASSOC);
        }

        try 
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dptos = obtenerDepartamento($conn);
            if($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $datos = datos();

                $conn -> beginTransaction();
                insertar($conn,$datos);

                departamentoInicial($conn,$datos['dni'],$datos['cod_dpto']);
                $conn -> commit();
                echo "Empleado creado correctamente";
                
            }
        }
        catch (PDOException $e) 
        {
            if ($conn && $conn -> inTransaction()) 
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
