<html>
    <head>
        <title></title>
    <!--a partir de la dirección IP y la máscara de red, obtener la dirección de red, la 
dirección de broadcast y el rango de IPs disponibles para los equipos.-->
    </head>
    <body>
        <?php
        $ip="192.168.16.100/26"; 
        
        $longitud = strlen($ip);
        $pos=0;

        for ($i=0; $i < $longitud ; $i++) 
        { 
            if (substr($ip,$i,1) == "/") 
            {
               $pos = $i;  
               break;      
            }
        }

        $parte=substr($ip,0,$pos);
        
        $mascara=0;
        for ($i=0; $i <strlen($mascaraParte) ; $i++)
        { 
            $mascara = $mascara*10 + (ord(substr($mascaraParte,$i,1))-ord('0'));
        }

        
        $empieza=0;
        $oct1=0;
        $oct2=0;
        $oct3=0;
        $oct4=0;
        $octNumero=1;

        for ($i=0; $i <=strlen($parte) ; $i++) 
        { 
           if($i==strlen($parte) || substr($parte,$i,1)==".")
           {
                $numeroParte=substr($parte,$empieza,$i-$empieza);
                $numero=0;
                for ($j=0; $j <strlen($numeroParte) ; $j++) 
                { 
                    $numero=$numero*10+(ord(substr($numeroParte,$j,1))-ord('0'));
                }
                if($octNumero==1)
                {
                    $oct1=$numero;   
                }    
                if($octNumero==2)
                {
                    $oct2=$numero;
                }
                if($octNumero==3)
                {
                    $oct3=$numero;
                }
                if($octNumero==4)
                {
                    $oct4=$numero;
                }
                $octNumero++;
                $empieza=$i+1;
           }
        }

        
        $binarioMascara=str_repeat("1",$mascara).str_repeat("0",32-$mascara);
        $mascaraOct1=bindec(substr($binarioMascara,0,8));
        $mascaraOct2=bindec(substr($binarioMascara,8,8));  
        $mascaraOct3=bindec(substr($binarioMascara,16,8));
        $mascaraOct4=bindec(substr($binarioMascara,24,8));

        
        $red1=$oct1 & $mascaraOct1;
        $red2=$oct2 & $mascaraOct2;
        $red3=$oct3 & $mascaraOct3;
        $red4=$oct4 & $mascaraOct4;

        
        $broadcast1=$red1+(255-$mascaraOct1);
        $broadcast2=$red2+(255-$mascaraOct2);
        $broadcast3=$red3+(255-$mascaraOct3);
        $broadcast4=$red4+(255-$mascaraOct4);

        
        $rangoInicial=$red1.".".$red2.".".$red3.".".($red4+1);
        $rangoFinal = $broadcast1.".".$broadcast2.".".$broadcast3.".".($broadcast4-1);

        
        echo "IP: ".$parte."/".$mascara."<br>";    
        echo "Máscara: ".$mascara."<br>";
        echo "Dirección Red: ".$red1.".".$red2.".".$red3.".".$red4."<br>";
        echo "Dirección Broadcast: ".$broadcast1.".".$broadcast2.".".$broadcast3.".".$broadcast4."<br>";
        echo "Rango: ".$rangoInicial." a ".$rangoFinal."<br>";
        ?>
    </body>
</html>
