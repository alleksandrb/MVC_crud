<?php

namespace Project\Controllers;

use Project\Models\Call;
use Project\Models\Operator;
use Project\Models\Telephone;

class OperatorController
{
    public function addOrUpdateOperatorRelation()
    {
        //добавление либо изменение стоимости вызова одного оператора второму
        $result = '';
        if($_POST['cost_for_one_minute'])
        {
            $sender_operator = $_POST['sender_operator'];
            $recipient_operator = $_POST['recipient_operator'];
            $new_cost = $_POST['cost_for_one_minute'];

            $operator = new Operator();

            //проверка существуют ли отношения между двумя операторами
            //если существуют и старая цена не ровняется новой обновляем данные в таблице
            //в противном случае добавляем в таблицу новые отношения между операторами
            if(@$old_cost = $operator->getCostForOneMinute($sender_operator,$recipient_operator))
            {
                if($old_cost === $new_cost)
                {
                    echo 'exists';
                    exit();
                }
                else
                {
                    $operator->newCostForOneMinute($sender_operator,$recipient_operator,$new_cost);
                    $result = 'update';
                }
            }
            else
            {
                $operator->setNewOperatorRelation($sender_operator,$recipient_operator,$new_cost);
                $result = 'add';
            }
        }
        echo $result ? $result : 'empty';
        exit();
    }

    public function addNewOperator()
    {
        //добавление нового оператора
        // в модели выполняется проверка на существование оператора с заданным именем
        if($operator_name = $_POST['operator_name'])
        {
            if((new Operator())->addNewOperator($operator_name))
            {
                echo 'ok';
            }else echo 'false';
        }
        else echo 'empty';

        exit();
    }

    public function remove()
    {
        //удаление оператора
        if($_POST['removed_operator'])
        {
            if((new Operator())->deleteOperator($_POST['removed_operator']))
                echo 'ok';
            else echo 'false';
        }
        exit();
    }

    public function statisticUserTalk()
    {
        //сколько пользователи потратели денег и проговорили минут за определенный период
        // в подсчет входят как исходящие так и входящие звонки
        if($_POST['start_period'] AND $_POST['end_period'])
        {
            $statistic = (new Operator())->statisticUsersTalkByPeriod($_POST['start_period'], $_POST['end_period']);
            if(!empty($statistic))
            {
                $statistic = json_encode($statistic);
                echo $statistic;
            }
            else echo 'empty';
        }
        exit();
    }
    public function oneDayCallsCount()
    {
        //статистика
        //сколько звонков совершенно оператором за один день

        if($selected_day = $_POST['selected_day'])
        {
            $operator_id = $_POST['operator'];

            //подсчитывание общего количества пользователей оператора
            $count_users = (new Telephone())->countOfOperatorUsers($operator_id);

            //записи из журнала за определенный день
            $calls_log = (new Call())->getAllInOneDay($selected_day);

            $calls_count = 0;
            // +1 если пользователь оператора совершал исходящий вызов
            foreach ($calls_log as $user_who_call)
            {
                foreach ($count_users as $operator_user)
                {
                    if($operator_user['user_id'] === $user_who_call['sender']) $calls_count++;
                }
            }
            echo $calls_count;
        }
        exit();
    }
}