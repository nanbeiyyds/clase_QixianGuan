<html>
<head>
    <title>ej2s - convertir IP decimal a binario sin printf y sprintf</title>
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
            $binario .= decbin((int)$parte) . ".";
            $parte = "";
        } else {
            $parte .= $c; 
        }
    }
    $binario .= decbin((int)$parte);

    echo "IP $ip en binario es $binario";
?>
</body>
</html>

