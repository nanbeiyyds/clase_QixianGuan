<html>
    <head>
        <title>Alta Categorías</title>
    </head>
    <body>
        <h2>Alta de Categorias</h2>

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
            $nombre = $_POST['nombre'];

            //conseguir último ID
            $sql = "SELECT ID_CATEGORIA 
                    FROM CATEGORIA
                    ORDER BY ID_CATEGORIA DESC LIMIT 1";
            $res = mysqli_query($db,$sql);

            $num = 1;

            if($fila = mysqli_fetch_assoc($res))
            {
                $parte = explode("-",$fila['ID_CATEGORIA']);
                $num = $parte[1]+1;
            }

            if($num < 10)
            {
                $nuevo = "C-00".$num;
            }
            else if($num< 100)
            {
                $nuevo = "C-0".$num;
            }
            else
            {
                $nuevo = "C-".$num;
            }

            $sql2 = "INSERT INTO CATEGORIA VALUES ('$nuevo','$nombre')";

            if(mysqli_query($db,$sql2))
            {
                echo "Categoria creado con ID: $nuevo<br><br>";
            }
            else
            {
                echo "Error: ".mysqli_error($db)."<br><br>";
            }
        }
        ?>
        <form method="post">
            <p>Nombre categoria : </p>
            <input type="text" name="nombre" required><br><br>
            <input type="submit" value="Guardar">
        </form>
    </body>
</html>