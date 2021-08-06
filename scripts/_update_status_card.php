<?php
    require_once 'db_connect.php';

    if (isset($_POST["update_id"]) && isset($_POST["update_status"]))
        
    

        if($_POST["update_status"] == "завершена")
            $query = 'UPDATE `task_list` SET `task_completed` = "'.strftime("%Y-%m-%d", time()).'", `task_status` = "'.$_POST["update_status"].'" WHERE `task_list`.`id` = '.$_POST["update_id"]; //UPDATE `task_list` SET `task_status` = 'завершена' WHERE `task_list`.`id` = 1;
            //UPDATE `task_list` SET `task_completed` = '2021-08-05' WHERE `task_list`.`id` = 1;
        else
            $query = 'UPDATE `task_list` SET `task_status` = "'.$_POST["update_status"].'" WHERE `task_list`.`id` = '.$_POST["update_id"];


        if (mysqli_query($link, $query)) {
            echo "Updated successfully";
            mysqli_close($link);
            header( 'Location: ../index.php');
            die();
        } 
        else {
            echo "Error: " .$query. "<br>" . mysqli_error($link);
            mysqli_close($link);
            die();
        }


    //mysqli_close($link);
    //header('Location: ../index.php');
    //die();
?>