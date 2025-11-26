<html>
    <head>
        <title>Alta Almacenes</title>
    </head>
    <body>
        <h2>Alta Almacenes</h2>
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
            $localidad = $_POST['localidad'];

            $sql = "INSERT INTO ALMACEN (LOCALIDAD) VALUES ('$localidad')";

            if(mysqli_query($db,$sql))
            {
                echo "Almacen creado con numero : ".mysqli_insert_id($db)."<br><br>";
            }
            else
            {
                echo "Error : ".mysqli_error($db)."<br><br>";
            }
        }
        ?>
        <form method="post">
            <p>Localidad:</P>
            <input type="text" name="localidad" required><br><br>
            <input type="submit" value="Guardar">
        </form>

    </body>
</html>
