<html>
    <head>
        <title>Consulta compras</title>
    </head>
    <body>
        <h2>Consulta de compras</h2>
        <?php
        define('DB_SERVER','localhost');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','rootroot');
        define('DB_DATABASE','comprasweb');
        
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        if(!$db)
        {
            die("Error conexión: " . mysqli_connect_error());
        }
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $nif = strtoupper($_POST['nif']);
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $cp = $_POST['cp'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];

            //valdar nif
            if(!preg_match("/^[0-9]{8}[A-Za-z]$/",$nif))
            {
                echo "NIF no valido<br><br>";
            }
            else
            {
                //comprobar si existe
                $check = mysqli_query($db,"SELECT * FROM CLIENTE WHERE NIF = '$nif'");
                if(mysqli_fetch_assoc($check))
                {
                    echo "Ya existe un cliente con ese NIF<br><br>";
                }
                else
                {
                    $sql = "INSERT INTO CLIENTE VALUES ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad')";

                    if(mysqli_query($db,$sql))
                    {
                        echo "Cliente creado correctamente<br><br> ";
                    }
                    else
                    {
                        echo "Error : ".mysqli_error($db)."<br><br>";
                    }
                }
            }
        }
        ?>
        <form method="post">
            NIF:
            <input type="text" name="nif" required><br><br>

            Nombre:
            <input type="text" name="nombre" required><br><br>

            Apellido:
            <input type="text" name="apellido" required><br><br>

            CP:
            <input type="text" name="cp"><br><br>

            Direccion :
            <input type="text" name="direccion"><br><br>

            Ciudad:
            <input type="text" name="ciudad"><br><br>

            <input type="submit" value="Guardar">
        </form>
    </body>
</html>