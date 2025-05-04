<?php

    $connect= new PDO("mysql: host='localhost';dbname='gestion_stock'","root","");
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
