<?php
    require_once 'db_connect.php';

    if (isset($_POST["del_id"]))
        $query = 'DELETE FROM `task_list` WHERE `task_list`.`id` = '.$_POST["del_id"];
        //echo $_POST["del_id"];


        if (mysqli_query($link, $query)) {
            echo "Deleted successfully";
            mysqli_close($link);
            header( 'Location: ../index.php');
            die();
        } 
        else {
            echo "Error: " .$query. "<br>" . mysqli_error($link);
            mysqli_close($link);
            die();
        }


    //mysqli_close($link); //надо сделать защиту от скл инъекций, хоть это и бессмысленно
    //header( 'Location: ../index.php');
    //die();
?>