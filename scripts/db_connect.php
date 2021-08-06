<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "tasks";

    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $link->set_charset('utf8');
    
    setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');  
?>
