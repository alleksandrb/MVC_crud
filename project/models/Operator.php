<?php

namespace Project\Models;

use Core\Model;

class Operator extends Model
{
    public function getAll()
    {
        return $this->findMany("SELECT * FROM operator");
    }

    public function addNewOperator($name)
    {
        $this->setOne("INSERT INTO operator (name) VALUES (\"$name\")");
        return $this->findOne("SELECT id FROM operator ORDER BY id DESC LIMIT 1")['id'];
    }

    public function getAllPriceList()
    {
        return  $this->findMany("SELECT * FROM call_cost ORDER BY sender_operator");
    }

    public function getCostForOneMinute($sender_operator_id, $recipient_operator_id)
    {
        return $this->findOne(" SELECT cost FROM call_cost WHERE sender_operator = $sender_operator_id AND recipient_operator = $recipient_operator_id")['cost'];
    }

    public function newCostForOneMinute($sender, $recipient, $new_cost)
    {
        return $this->setOne("UPDATE call_cost SET cost=$new_cost WHERE sender_operator=$sender AND recipient_operator=$recipient");
    }

    public function setNewOperatorRelation($sender, $recipient, $new_cost)
    {
        return $this->setOne("INSERT INTO call_cost (sender_operator, recipient_operator, cost) VALUES ($sender, $recipient, $new_cost)");
    }

    public function deleteOperator($id)
    {
        $this->setOne("DELETE FROM operator WHERE id = $id");
        return $this->setOne("DELETE FROM call_cost WHERE sender_operator = $id OR recipient_operator= $id");
    }

    public function isExistOperator($id)
    {
        if($this->findOne("SELECT * FROM operator WHERE id = $id"))
            return true;
        else return false;
    }

    public function statisticUsersTalkByPeriod($from, $to)
    {
        $from = $from . ' 00:00:00';
        $to = $to . ' 00:00:00';
        //получаем все звонки совершенные за определенный период
        $all_calls_by_period = $this->findMany("SELECT * FROM call_log WHERE start_time>=\"$from\" AND start_time<=\"$to\"");
        //получаем всех пользователей
        $users = (new User())->getAll();

        $price_list_for_users = [];

        //проверяем кто из пользователей совершил звонок сопоставляю элементы двух массивов по id
        //и для каждого пользователя суммируем стоимость каждого звонка и длительность разговора
        foreach ($users as $user)
        {
            $cost = 0;
            $call_duration = 0;
            foreach ($all_calls_by_period as $one_call)
            {
                if($user['id'] === $one_call['sender'])
                {
                    $cost += $one_call['cost'];
                    $call_duration += $one_call['call_duration'];
                }
                if($user['id'] === $one_call['recipient'])
                    $call_duration += $one_call['call_duration'];
            }
            $price_list_for_users[$user['id']]['cost'] = $cost;
            $price_list_for_users[$user['id']]['user_name'] = $user['name'] . ' ' . $user['surname'];
            $price_list_for_users[$user['id']]['call_duration'] = $call_duration;
        }
        return $price_list_for_users;
    }

}