<?php 
    require_once 'db_connect.php';

    $p_title = mysqli_real_escape_string($link, $_POST["title"]);
    $p_name = mysqli_real_escape_string($link, $_POST["name"]);
    $p_descr = mysqli_real_escape_string($link, $_POST["descr"]);
    $p_date = mysqli_real_escape_string($link, $_POST["date"]);
    $p_status = mysqli_real_escape_string($link, $_POST["status"]);
    if (($_POST["status"]) == "завершена")
        $sql = "INSERT INTO `task_list` (`task_title`, `task_name`, `task_descr`, `task_date`, `task_completed`, `task_status`) VALUES ('".$p_title."', '".$p_name."', '".$p_descr."', '".$p_date."', '".strftime("%Y-%m-%d", time())."','".$p_status."')";
    else
        $sql = "INSERT INTO `task_list` (`task_title`, `task_name`, `task_descr`, `task_date`, `task_status`) VALUES ('".$p_title."', '".$p_name."', '".$p_descr."', '".$p_date."', '".$p_status."')";
    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
        mysqli_close($link);
        header( 'Location: ../index.php');
        die();
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
        mysqli_close($link);
        die();
    }

//INSERT INTO `task_list` (`id`, `task_title`, `task_name`, `task_descr`, `task_date`, `task_status`) VALUES ('4', 'Проверка данных вставки в базу', 'Пелагея', 'Проверяем и копируем', '2021-08-06', 'в работе');  
?>
