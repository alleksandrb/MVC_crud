<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Журнал вызовов
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <div class="journal_table">
                    <table class="table table-hover caption-top ">
                        <thead class="table-light ">
                            <tr class="table-primary">
                                <th scope="col">ID</th>
                                <th scope="col">Кто звонил</th>
                                <th scope="col">Кому звонили</th>
                                <th scope="col">Время начала разговора</th>
                                <th scope="col">Время окончания разговора</th>
                                <th scope="col">Длительность разговора</th>
                                <th scope="col">Стоимость звонка</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($calls as $call):?>
                            <tr>
                                <th scope="row"><?=$call['id']?></th>
                                <td><?=$call['sender']?></td>
                                <td><?=$call['recipient']?></td>
                                <td><?=$call['start_time']?></td>
                                <td><?=$call['end_time']?></td>
                                <td><?=$call['call_duration']?></td>
                                <td><?=$call['cost']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="journal_table_buttons buttons_block">
                        <button id="journal_add_button" type="button" class="btn btn-outline-primary">Добавить запись в таблицу</button>
                        <button id="journal_remove_button" type="button" class="btn btn-outline-danger">Удалить запись</button>
                    </div>
                    <div class="journal_add_table_forms block_forms_common_styles">
                        <form id="add_call">
                            <div class="row">
                                <div class="col">
                                    <label for="sender" class="form-label">Кто звонил (тел)</label>
                                    <input type="text" class="form-control mask_phone" required name ="sender">
                                </div>
                                <div class="col">
                                    <label for="recipient" class="form-label">Кому звонили (тел)</label>
                                    <input type="text" class="form-control mask_phone" required name="recipient">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="start_time" class="form-label">Время начала разговора</label>
                                    <input type="text" class="form-control" id="start_time" required name="start_time">
                                </div>
                                <div class="col">
                                    <label for="call_duration" class="form-label">Длительность разговора (сек)</label>
                                    <input type="number" class="form-control" required name="call_duration">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="journal_add" type="submit" class="btn btn-success">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="journal_remove_table_forms block_forms_common_styles">
                        <form id="remove_call">
                            <div class="row">
                                <div class="col">
                                    <label for="id" class="form-label">ID записи</label>
                                    <input type="text" class="form-control" id="call_remove_id" name="id">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="journal_remove" type="submit" class="btn btn-success">Удалить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                Пользователи
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <div class="user_table">
                    <table class="table table-hover caption-top ">
                        <thead class="table-light ">
                            <tr class="table-primary">
                                <th scope="col">ID</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Оператор</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user):?>
                            <tr>
                                <th scope="row"><?=$user['id']?></th>
                                <td><?=$user['name'] . ' ' . $user['surname'] ?></td>
                                <td><?=$user['phone']?></td>
                                <td><?=$user['operator']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="user_table_buttons buttons_block">
                        <button id="user_add_button" type="button" class="btn btn-outline-primary">Добавить пользователя</button>
                        <button id="user_update_button" type="button" class="btn btn-outline-primary">Изменить номер телефона пользователя</button>
                        <button id="user_remove_button" type="button" class="btn btn-outline-danger">Удалить пользователя</button>
                    </div>
                    <div class="user_add_table_forms block_forms_common_styles">
                        <form id="add_user_form">
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="form-label">Имя</label>
                                    <input type="text" class="form-control" name ="name">
                                </div>
                                <div class="col">
                                    <label for="surname" class="form-label">Фамилия</label>
                                    <input type="text" class="form-control" name ="surname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="phone_number" class="form-label">Номер телефона</label>
                                    <input type="text" class="form-control mask_phone" name ="phone_number">
                                </div>
                                <div class="col">
                                    <label for="operator" class="form-label">Оператор</label>
                                    <select name="operator" class="form-select">
                                        <?php foreach ($operators as $id => $name):?>
                                            <option value="<?=$id?>"><?=$name?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="user_add" type="submit" class="btn btn-success">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="user_remove_table_forms block_forms_common_styles">
                        <form id="remove_user_form">
                            <div class="row">
                                <div class="col">
                                    <label for="phone_number" class="form-label">Номер телефона</label>
                                    <input type="text" class="form-control mask_phone"  name ="phone_number">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="user_remove" type="submit" class="btn btn-success">Удалить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="update_user_phone_block block_forms_common_styles">
                        <form id="update_user_phone_form">
                            <div class="row">
                                <div class="col">
                                    <label for="old_phone_number" class="form-label">Старый номер телефона</label>
                                    <input type="text" class="form-control mask_phone" required name ="old_phone_number">
                                </div>
                                <div class="col">
                                    <label for="new_phone_number" class="form-label">Новый номер телефона</label>
                                    <input type="text" class="form-control mask_phone" required name ="new_phone_number">
                                </div>
                                <div class="col">
                                    <label for="new_phone_operator" class="form-label">Оператор нового номера</label>
                                    <select name="new_phone_operator" class="form-select">
                                        <?php foreach ($operators as $id => $name):?>
                                            <option value="<?=$id?>"><?=$name?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="update_user_phone" type="submit" class="btn btn-success">Изменить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Прайс-лист операторов
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
                <div class="operator_price_table">
                    <table class="table table-hover caption-top ">
                        <thead class="table-light ">
                            <tr class="table-primary">
                                <th scope="col">Оператор совершающий вызов</th>
                                <th scope="col">Оператор принимающий вызов</th>
                                <th scope="col">Стоимость за минуту, коп.</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($operators_price_list as $operator_price):?>
                            <tr>
                                <td><?=$operators[$operator_price['sender_operator']]?></td>
                                <td><?=$operators[$operator_price['recipient_operator']]?></td>
                                <td><?=$operator_price['cost']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="operator_price_table_buttons buttons_block">
                        <button id="operator_price_update_button" type="button" class="btn btn-outline-primary">Изменить/добавить стоимость</button>
                        <button id="operator_add_button" type="button" class="btn btn-outline-primary">Добавить оператора</button>
                        <button id="operator_remove_button" type="button" class="btn btn-outline-danger">Удалить оператора</button>
                    </div>
                    <div class="operator_price_add_block block_forms_common_styles">
                        <form id="operator_price_add_form">
                            <div class="row">
                                <div class="col">
                                    <label for="sender_operator" class="form-label">Оператор совершающий вызов</label>
                                    <select name="sender_operator" class="form-select">
                                        <?php foreach ($operators as $id => $name):?>
                                            <option value="<?=$id?>"><?=$name?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="recipient_operator" class="form-label">Оператор принимающий вызов</label>
                                    <select name="recipient_operator" class="form-select">
                                        <?php foreach ($operators as $id => $name):?>
                                            <option value="<?=$id?>"><?=$name?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="cost_for_one_minute" class="form-label">Стоимость за минуту, коп.</label>
                                    <input type="number" class="form-control" name ="cost_for_one_minute">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="operator_price_add" type="submit" class="btn btn-success">Изменить/добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="add_new_operator_block block_forms_common_styles">
                        <form id="add_new_operator_form">
                            <div class="row">
                                <div class="col">
                                    <label for="operator_name" class="form-label">Наименование оператора</label>
                                    <input type="text" class="form-control" name ="operator_name">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="add_new_operator" type="submit" class="btn btn-success">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="remove_operator_block block_forms_common_styles">
                        <form id="remove_operator_form">
                            <div class="row">
                                <div class="col">
                                    <label for="removed_operator" class="form-label">Наименование оператора</label>
                                    <select name="removed_operator" class="form-select">
                                        <?php foreach ($operators as $id => $name):?>
                                            <option value="<?=$id?>"><?=$name?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="remove_operator" type="submit" class="btn btn-success">Удалить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                Статистика
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
                <div class="statistic mt-5">
                    <div class="statistic_table_buttons buttons_block">
                        <button id="users_statistic_button" type="button" class="btn btn-info">Посмотреть статистику звонков пользователя</button>
                        <button id="operator_statistic_button" type="button" class="btn btn-info">Количество звонков совершенных оператором за день</button>
                    </div>
                    <div class="users_statistic_block block_forms_common_styles">
                        <form id="users_statistic_form">
                            <div class="row">
                                <div class="col">
                                    <label for="start_period" class="form-label">Начало периода</label>
                                    <input type="text" class="form-control mask_period" name ="start_period">
                                </div>
                                <div class="col">
                                    <label for="end_period" class="form-label">Конец период</label>
                                    <input type="text" class="form-control mask_period" name ="end_period">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button id="user_statistic" type="submit" class="btn btn-success">Показать</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-hover caption-top ">
                            <caption>Статистика за период</caption>
                            <thead class="table-light ">
                                <tr class="table-primary">
                                    <th scope="col">Имя</th>
                                    <th scope="col">Сумма потраченная за период, коп.</th>
                                    <th scope="col">Продолжительность разговоров, сек</th>
                                </tr>
                            </thead>
                            <tbody id="user_statistic_table_tbody">
                            </tbody>
                        </table>
                    </div>
                    <div class="operator_statistic_block block_forms_common_styles">
                        <form id="operator_statistic_form" class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="operator" class="form-label">Oператор</label>
                                    <select name="operator" id="statistic_operator_name" class="form-select">
                                        <?php foreach ($operators as $id => $name):?>
                                            <option value="<?=$id?>"><?=$name?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="selected_day" class="form-label">День</label>
                                    <input type="text" class="form-control mask_period" name ="selected_day">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button id="operator_statistic" type="submit" class="btn btn-success">Показать</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-hover w-50">
                            <thead class="table-light ">
                                <tr class="table-primary">
                                    <th scope="col">Количество звонков совершенных за день</th>
                                </tr>
                            </thead>
                            <tbody id="operator_statistic_table_tbody">
                                <tr>
                                    <td id="days_count"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>