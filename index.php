<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Карты на столе</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
</head>
<body>
    <div class="wrapper">
        <div id="container">
            <header id="header">
                <div class="header_body">
                    <h1>
                        Список дел <br class="mobile-break"> "Карты на столе"
                    </h1>
                    <div class="header_menu">
                        <ul class="header_list">
                            <button onclick="Popup_toggle();"><span>Добавить новую задачу</span><img class="mobile__button mobile_add" alt="Добавить" src="../img/add.png"/></button>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="main_stream">
                <?php
                    require __DIR__.'/scripts/order_menu_render.php';
                    require __DIR__.'/scripts/load_cards.php';
                ?>
            </div>
            
            <footer id="footer">
                <div class="footer_body">
                    <div class="footer_text">
                        Карты на столе - всегда разложены в правильном порядке
                    </div>
                </div>
            </footer>

            <div class="popup_window hidden_elem">
                <div class="popup_close_area" onclick="Popup_toggle();"></div>
                <div class="popup_container">
                    <div class="popup_close" onclick="Popup_toggle();">X</div>
                    <div class="popup_body">
                        <form action="./scripts/publish_card.php" onsubmit="" method="post">
                            <div class="popup_title">Добавить новую задачу</div>
                            <label class="popup-label" for="popup-title">Название задачи: </label> 
                                <input type="text" required id="popup-title" maxlength='240' name="title"/>
                            
                            <br/>

                            <label class="popup-label" for="popup-name">Имя исполнителя: </label>
                            <select id="popup-name" name="name">
                                <option disabled>Выберите исполнителя</option>
                                <option selected value="Пелагея Максимова">Пелагея Максимова</option>
                                <option value="Михаил Павлович">Михаил Павлович</option>
                                <option value="Кирю Кадзума">Кирю Кадзума</option>
                                <option value="Гоша Маджимович">Гоша Маджимович</option>
                            </select>

                            <br/>

                            <label class="popup-label" for="popup-descr">Описание задачи: </label> 
                                <textarea required id="popup-descr" name="descr" maxlength='240'></textarea>
                            
                            <br/>

                            <label class="popup-label" for="popup-date">Срок выполнения: </label>
                                <input required type="date" id="popup-date" name="date">
                            
                            <br/>

                            <label class="popup-label" for="popup-status">Статус задачи: </label>
                            <select id="popup-status" name="status">
                                <option disabled>Выберите статус</option>
                                <option selected value="добавлена">добавлена</option>
                                <option value="в работе">в работе</option>
                                <option value="завершена">завершена</option>
                            </select>

                            <br/>

                            <button type="submit" class="pc_submit success" color="primary">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="popup_status"></div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
