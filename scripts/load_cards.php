<?php
    require_once 'db_connect.php';
    
    $limit = 6;
    $page = intval(@$_GET['page']);
    $page = (empty($page)) ? 1 : $page;				
    $start = ($page != 1) ? $page * $limit - $limit : 0;

    if (isset($_GET["tags"])) // по каждой из категорий через GET
        $query = 'SELECT * FROM task_list ORDER BY '.$_GET["tags"].' DESC LIMIT '.$start.', '.$limit;
    else
        $query = 'SELECT * FROM task_list ORDER BY id DESC LIMIT '.$start.', '.$limit;
    

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_num_rows($result);

    
    for ($j = 0 ; $j < $rows ; ++$j) {
        $row = mysqli_fetch_row($result);
        echo '
        <li id="card_'.htmlspecialchars($row[0]).'">
            <div class="task_card';
            //если дата задачи истекла то добавим класс который покрасит её в цвет, если задача завершена то нет смысла красить
            if ((date($row[4]) <= date("Y-m-d")) && ($row[6] != 'завершена'))
                echo ' task_suspended';
            echo '">
                <div class="task_name">'
                    .htmlspecialchars($row[2]).
                '</div>
                <div class="task_title">'
                    .htmlspecialchars($row[1]).
                '</div>
                <div class="task_descr">'
                    .htmlspecialchars($row[3]).
                '</div>
                
                <div class="task_status"> Статус: <strong>'
                    .htmlspecialchars($row[6]).
                '</strong></div>
                <div class="task_delete">';

                //если статус завершен, то статус менять нельзя, по условию
                if ($row[6] != 'завершена') {
                    echo '
                        <button onclick="change_status('.htmlspecialchars($row[0]).');"><span>Изменить статус</span><img class="mobile__button" alt="Изменить" src="../img/settings.png"/></button>
                    ';
                }
                echo '
                </div>
                <div class="task_date">'
                    .iconv('windows-1251', 'utf-8', strftime("%d %b,  %Y", strtotime(htmlspecialchars($row[4])))).
                '</div>
                <div class="task_delete">';
                if ($row[5] == NULL)
                    echo '<button class="" onclick="delete_task('.htmlspecialchars($row[0]).');"><span>Удалить задачу</span><img class="mobile__button" alt="Удалить" src="../img/can.png"/></button>';
                echo '</div>
                <div class="task_date">';
                if ($row[5] != NULL)
                    echo 'Дата выполнения: <br class="mobile-break">'
                        .iconv('windows-1251', 'utf-8', strftime("%d %b,  %Y", strtotime(htmlspecialchars($row[5]))));

                echo '</div>';
                if ($row[5] != NULL)
                    echo '<div class="task_delete">
                        <button class="" onclick="delete_task('.htmlspecialchars($row[0]).');"><span>Удалить задачу</span><img class="mobile__button" alt="Удалить" src="../img/can.png"/></button>
                    </div>';

                echo ' 
            </div>
        </li>';
    };

    //пагинация

    //узнаем количество записей чтобы выводить кнопку следующей страницы по необходимости
    $db_count = mysqli_query($link, "SELECT count(*) FROM task_list");
    $db_arr = mysqli_fetch_row($db_count);
    $db_c = $db_arr[0];

    echo '<div class="pagination ';
    //если дальше или назад нет хода то в pagination будет только одна кнопка, и она должна отрисоваться посередине
    if (($page >= $db_c/$limit) || !(!isset($page) || ($page > 1)))
        echo 'one_item">';
    else 
        echo '">';
//if (isset($_GET["tags"]))
    if (!isset($page) || ($page > 1)) {
        echo '<a href="/?page='.($page - 1);
        if (isset($_GET["tags"]))
            echo '&tags='.$_GET["tags"];
        echo'"><div class="desktop_view">Предыдущая страница</div><img class="mobile__button" alt="Назад" src="../img/l_arr.png"/></a>';
    }
    if ($page < $db_c/$limit) {
        echo '<a href="/?page='.($page + 1);
        if (isset($_GET["tags"]))
            echo '&tags='.$_GET["tags"];
        echo '"><div class="desktop_view">Следующая страница</div><img class="mobile__button" alt="Вперед" src="../img/r_arr.png"/></a>';
    }
    echo '</div>';

    //$row[1] //task_title
    //$row[2] //task_name
    //$row[3] //task_descr
    //$row[4] //task_date
    //$row[5] //task_completed
    //$row[6] //task_status

    mysqli_free_result($result);
    mysqli_close($link);
?>