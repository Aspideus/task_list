function Popup_toggle(){
    document.querySelector('.popup_window').classList.toggle('hidden_elem');
};

function order_mobile_close(){
    document.querySelector('.order_menu').classList.toggle('hidden_elem__mobile');
};

function delete_task(id) {
    document.querySelector('.popup_status').innerHTML = `
    <div class="popup_window">
        <div class="popup_close_area" onclick="change_status_end();"></div>
            <div class="popup_container">
                <div class="popup_body">
                    <form action="./scripts/_delete_card.php" onsubmit="" method="post">
                        <div class="popup_vertical_space"></div>
                        <div class="popup_title">Вы уверены, что хотите удалить запись?</div>
                        <input type="hidden" name="del_id" value = "${id}" >
                        <button type="submit" class="pc_submit del_left" color="primary">Удалить</button>
                        <button class="pc_submit del_right" onclick="change_status_end();">Отмена</button>
                    </form>
                </div>
            </div>
    </div>
    `;
};

function change_status(id) {
    document.querySelector('.popup_status').innerHTML = `
    <div class="popup_window">
        <div class="popup_close_area" onclick="change_status_end();"></div>
            <div class="popup_container">
                <div class="popup_close" onclick="change_status_end();">X</div>
                <div class="popup_body">
                    <form action="./scripts/_update_status_card.php" onsubmit="" method="post">
                        <div class="popup_title">Изменить статус задачи</div>

                        <br/>
                        <div class="popup_vertical_space"></div>
                        <input type="hidden" name="update_id" value = "${id}" >

                        <label class="popup-label" for="popup-status">Статус задачи: </label>
                            <select id="popup-status" name="update_status">
                                <option disabled>Выберите статус</option>
                                <option selected value="добавлена">добавлена</option>
                                <option value="в работе">в работе</option>
                                <option value="завершена">завершена</option>
                            </select>

                        <br/>

                        <button type="submit" class="pc_submit" color="primary">Сохранить</button>
                    </form>
                </div>
            </div>
    </div>
    `;

};

function change_status_end() {
    document.querySelector('.popup_status').innerHTML = ``;
};