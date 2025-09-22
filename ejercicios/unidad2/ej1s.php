<html>
<head>
    <title>ej1s - Conversion IP Decimal a Binario con sprintf y printf</title>
</head>
<body>
<?php
    $ip = "192.18.16.204"; 
    $parte = "";
    $binario = "";

    $longitud = strlen($ip);   
    for ($i = 0; $i < $longitud; $i++) {
        $c = $ip[$i];          

        if ($c == ".") {
            
            $binario .= sprintf("%08b", (int)$parte) . ".";
            $parte = "";
        } else {
            $parte .= $c;      
        }
    }

    
    $binario .= sprintf("%08b", (int)$parte);

    echo "IP $ip en binario es $binario";
?>
</body>
</html>
