<html>
    <head>
        <title>Alta productos</title>
    </head>
    <body>
        <h2>Alta productos</h2>
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

        //cargar categorias para el select
        $categorias = mysqli_query($db,"SELECT * FROM CATEGORIA");

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            //conseguir último ID producto
            $sql = "SELECT ID_PRODUCTO
                    FROM PRODUCTO 
                    ORDER BY ID_PRODUCTO DESC LIMIT 1";
            $res = mysqli_query($db,$sql);

            $num = 1;

            if($fila = mysqli_fetch_assoc($res))
            {
                $solo = substr($fila['ID_PRODUCTO'],1); //quitar la P
                $num = $solo + 1;
            }

            if($num < 10)
            {
                $nuevo = "P000".$num;
            }
            else if ($num < 100)
            {
                $nuevo = "P00".$num;
            }
            else if($num < 1000)
            {
                $nuevo = "P0".$num;
            }
            else
            {
                $nuevo = "P".$num;
            }

            $sql2 = "INSERT INTO PRODUCTO VALUES ('$nuevo','$nombre','$precio','$categoria')";

            if(mysqli_query($db,$sql2))
            {
                echo "Producto creado con ID: $nuevo<br><br>";
            }
            else
            {
                echo "Error : ".mysqli_error($db)."<br><br>";
            }
        }
        ?>
        <form method="post">
            <p>nombre producto:</p>
            <input type="text" name="nombre" required><br><br>

            <p>Precio :</p>
            <input type="number" step="0.01" name="precio" required><br><br>

            <p>Categoria : </p>
            <select name="categoria">
                <?php
                while($c = mysqli_fetch_assoc($categorias))
                {
                    echo "<option value = '".$c['ID_CATEGORIA']."'>".$c['NOMBRE']."</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="submit" value = "Guardar">
        </form>
    </body>
</html>