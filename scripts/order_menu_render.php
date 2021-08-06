<div class="order_mobile__button" onclick="order_mobile_close();">Сортировка</div>
<div class="order_menu hidden_elem__mobile">
    <div class="order_close" onclick="order_mobile_close();"></div>
    <div class="order_body">
    <?php 
        if (isset($_GET["tags"]))
            echo '<a href="/" class="show_all">Показать все</a>';
    ?>
    <span>Сортировка:</span>
    <a href="/?tags=task_name">по исполнителю</a>
    <a href="/?tags=task_date">по сроку выполнения</a>
    <a href="/?tags=task_completed">по дате выполнения</a>
    <a href="/?tags=task_status">по статусу</a>
    </div>
</div>
