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
                $nombre = $_POST["nombre"];
                $conn->beginTransaction();

                $sql_select = "SELECT cod_dpto FROM departamento ORDER BY cod_dpto DESC LIMIT 1";
                $stmt_select = $conn->query($sql_select);
                $fila = $stmt_select->fetch(PDO::FETCH_ASSOC); 
                
                $num = 1;

                if($fila)
                {
                    $num = intval(substr($fila["cod_dpto"], 1)) + 1;
                }

                if($num < 10) 
                {
                    $nuevo_cod_dpto = "D00" . $num;
                } 
                else if ($num < 100) 
                {
                    $nuevo_cod_dpto = "D0" . $num;
                }    
                else 
                {
                    $nuevo_cod_dpto = "D" . $num;
                }

                $sql_insert = "INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES (:cod, :nombre)";
                $stmt_insert = $conn->prepare($sql_insert);
        
                $stmt_insert->bindParam(':cod', $nuevo_cod_dpto);
                $stmt_insert->bindParam(':nombre', $nombre);
                $stmt_insert->execute(); 
        
                $conn->commit();
                echo "<p>Departamento creado correctamente : $nuevo_cod_dpto</p><br>";
            }
        }
        catch (PDOException $e) 
        {
            // dehacer si hay error
            if ($conn && $conn->inTransaction()) 
            {
                $conn->rollBack();
            }
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
        $conn = null;
?>
