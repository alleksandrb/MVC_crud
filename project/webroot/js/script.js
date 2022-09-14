document.addEventListener('click', (e) =>{

    //кнопки открывающие формы
    if(e.target.id === 'journal_add_button'){
        document.querySelector('.journal_add_table_forms').classList.toggle('active');
        document.querySelector('.journal_remove_table_forms').classList.remove('active');
    }
    if(e.target.id === 'journal_remove_button'){
        document.querySelector('.journal_remove_table_forms').classList.toggle('active');
        document.querySelector('.journal_add_table_forms').classList.remove('active');
    }
    if(e.target.id === 'user_add_button'){
        document.querySelector('.user_add_table_forms').classList.toggle('active');
        document.querySelector('.user_remove_table_forms').classList.remove('active');
        document.querySelector('.update_user_phone_block').classList.remove('active');
    }
    if(e.target.id === 'user_remove_button'){
        document.querySelector('.user_remove_table_forms').classList.toggle('active');
        document.querySelector('.user_add_table_forms').classList.remove('active');
        document.querySelector('.update_user_phone_block').classList.remove('active');
    }
    if(e.target.id === 'user_update_button'){
        document.querySelector('.update_user_phone_block').classList.toggle('active');
        document.querySelector('.user_remove_table_forms').classList.remove('active');
        document.querySelector('.user_add_table_forms').classList.remove('active');
    }
    if(e.target.id === 'operator_price_update_button'){
        document.querySelector('.operator_price_add_block').classList.toggle('active');
        document.querySelector('.remove_operator_block').classList.remove('active');
        document.querySelector('.add_new_operator_block').classList.remove('active');
    }
    if(e.target.id === 'operator_remove_button'){
        document.querySelector('.remove_operator_block').classList.toggle('active');
        document.querySelector('.add_new_operator_block').classList.remove('active');
        document.querySelector('.operator_price_add_block').classList.remove('active');
    }
    if(e.target.id === 'operator_add_button'){
        document.querySelector('.add_new_operator_block').classList.toggle('active');
        document.querySelector('.remove_operator_block').classList.remove('active');
        document.querySelector('.operator_price_add_block').classList.remove('active');
    }
    if(e.target.id === 'users_statistic_button'){
        document.querySelector('.users_statistic_block').classList.toggle('active');
        document.querySelector('.operator_statistic_block').classList.remove('active');
    }
    if(e.target.id === 'operator_statistic_button'){
        document.querySelector('.operator_statistic_block').classList.toggle('active');
        document.querySelector('.users_statistic_block').classList.remove('active');
    }



    //отправка форм

    //журнал вызовов
    if (e.target.id === 'journal_add'){
        e.preventDefault();
        fetch('/call/add', {
            method: 'POST',
            body: new FormData(document.querySelector('#add_call')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text === 'ok')
                {
                    alert('Запись успешно добавлена');
                    location.reload();
                }
                else if(text === "no_rel")
                    alert('Сперва установите стоимость вызова для оператора!');
                else if(text === "no_phone_sender")
                    alert('Абонента совершающего вызов с таким номером нет в базе!');
                else if(text === "no_phone_recipient")
                    alert('Абонента принимающего вызов с таким номером нет в базе!');
                else if(text === "no_operator_sender")
                    alert('Оператор абонента соверщающего вызов удален из базы! Измените номер телефона абонента');
                else if(text === "no_recipient_sender")
                    alert('Оператор абонента принимающего вызов удален из базы! Измените номер телефона абонента');
                else alert(text);
            }
        );
    }
    if (e.target.id === 'journal_remove'){
        e.preventDefault();
        fetch('/call/remove', {
            method: 'POST',
            body: new FormData(document.querySelector('#remove_call')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text === 'false')
                {
                    alert(text);
                }
                if(text === 'ok')
                {
                    alert('Запись успешно удалена');
                    location.reload();
                }
            }
        );
    }

    //Пользователи
    if (e.target.id === 'user_add'){
        e.preventDefault();
        fetch('/user/add', {
            method: 'POST',
            body: new FormData(document.querySelector('#add_user_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text !== 'ok')
                {
                    alert(text);
                }
                if(text === 'ok')
                {
                    alert('Пользователь успешно добавлен!');
                    location.reload();
                }
            }
        );
    }
    if (e.target.id === 'user_remove'){
        e.preventDefault();
        fetch('/user/remove', {
            method: 'POST',
            body: new FormData(document.querySelector('#remove_user_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text === 'false')
                    alert(text);

                if (text === 'no_user')
                    alert('Пользователя с таким номером нет');

                if(text === 'ok')
                {
                    alert('Пользователь удален');
                    location.reload();
                }
            }
        );
    }
    if (e.target.id === 'update_user_phone'){
        e.preventDefault();
        fetch('/user/updatephone', {
            method: 'POST',
            body: new FormData(document.querySelector('#update_user_phone_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text === 'false')
                    alert(text);

                if (text === 'no_user')
                    alert('Пользователя с таким номером нет');

                if(text === 'ok')
                {
                    alert('Телефон успешно изменен');
                    location.reload();
                }
            }
        );
    }

    //Операторы
    if (e.target.id === 'operator_price_add'){
        e.preventDefault();
        fetch('/operator/update', {
            method: 'POST',
            body: new FormData(document.querySelector('#operator_price_add_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text === 'empty')
                {
                    alert('Пустая форма отправки');
                }
                else if(text === 'update')
                {
                    alert('Стоимость обновлена!');
                    location.reload();
                }
                else if(text === 'exists')
                {
                    alert('Такая цена уже установлена на данный момент!');
                    location.reload();
                }
                else if(text === 'add')
                {
                    alert('Добавлены новые отношения операторов!');
                    location.reload();
                }
                else
                {
                    alert(text);
                }
            }
        );
    }
    if (e.target.id === 'add_new_operator'){
        e.preventDefault();
        fetch('/operator/add', {
            method: 'POST',
            body: new FormData(document.querySelector('#add_new_operator_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text === 'false')
                    alert("Ошибка добавления оператора");

                if(text === 'ok')
                {
                    alert('Оператор успешно добавлен! Не забудьте указать стоимость вызовов');
                    location.reload();
                }
                if (text === 'empty')
                    alert('Укажите имя оператора!');
            }
        );
    }
    if (e.target.id === 'remove_operator'){
        e.preventDefault();
        fetch('/operator/remove', {
            method: 'POST',
            body: new FormData(document.querySelector('#remove_operator_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            text => {
                if(text === 'false')
                    alert(text);
                if(text === 'ok')
                {
                    alert('Оператор удален');
                    location.reload();
                }
            }
        );
    }

    //Статистика
    if (e.target.id === 'user_statistic'){
        e.preventDefault();
        fetch('/operator/user_statistic', {
            method: 'POST',
            body: new FormData(document.querySelector('#users_statistic_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            usersStatistic => {
                if(usersStatistic){
                    usersStatistic = JSON.parse(usersStatistic);
                    let tbody = '';
                    for (let userId in usersStatistic)
                    {
                        let tr = '<tr>';
                        tr += `<td>${usersStatistic[userId]['user_name']}</td>`;
                        tr += `<td>${usersStatistic[userId]['cost']}</td>`;
                        tr += `<td>${usersStatistic[userId]['call_duration']}</td>`;
                        tr += '</tr>';
                        tbody += tr;
                    }
                    document.querySelector('#user_statistic_table_tbody').innerHTML = tbody;
                }
            }
        );
    }
    if (e.target.id === 'operator_statistic'){
        e.preventDefault();
        fetch('/operator/one_day_statistic', {
            method: 'POST',
            body: new FormData(document.querySelector('#operator_statistic_form')),
        }).then(
            response => {
                return response.text(); // ответ сервера
            }
        ).then(
            callsCount => {
                if(!isNaN(+callsCount)){
                    document.querySelector('#days_count').innerHTML = callsCount;
                }
            else alert('Что-то пошло не так');
            }
        );
    }
})


