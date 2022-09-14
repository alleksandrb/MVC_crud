<?php

namespace Project\Controllers;

use Core\Controller;
use Project\Models\Call;
use Project\Models\CallCost;
use Project\Models\Operator;
use Project\Models\Telephone;

class CallController extends Controller
{
    public function add()
    {
        if($_POST)
        {
            $sender_phone = $_POST["sender"];
            $recipient_phone = $_POST["recipient"];
            $call_duration = $_POST["call_duration"];
            $start_time = $_POST["start_time"];

            if($sender_phone && $recipient_phone)
            {

                $sender_phone = preg_replace('/(\D)/','', $sender_phone);
                $recipient_phone = preg_replace('/(\D)/','', $recipient_phone);

                if($sender_phone===$recipient_phone)
                {
                    echo "Пользователь не может позвонить сам себе";
                    exit();
                }
            }
            else
            {
                echo 'Не заполнены номера отправителя и/или получателя';
                exit();
            }

            if ($start_time)
            {
                $start_time = (new \DateTime($start_time))->getTimestamp();
                $end_time =  date("Y-m-d H:i:s", $start_time + $call_duration);
                $start_time = date("Y-m-d H:i:s", $start_time);
            }
            else
            {
                echo 'Не валидная дата';
                exit();
            }
            if ($call_duration)
                $call_duration = preg_replace('/(\D)/','', $call_duration);
            else
            {
                echo 'Заполните длительность звонка';
                exit();
            }

            $telephone = new Telephone();
            $operator = new Operator();

            if(@!$sender_operator_id = $telephone->getOperatorId($sender_phone))
            {
                echo 'no_phone_sender';
                exit();
            }
            if(!$operator->isExistOperator($sender_operator_id))
            {
                echo 'no_operator_sender';
                exit();
            }
            $sender_user_id = $telephone->getUserId($sender_phone);

            if(@!$recipient_operator_id = $telephone->getOperatorId($recipient_phone))
            {
                echo 'no_phone_recipient';
                exit();
            }
            if(!$operator->isExistOperator($recipient_operator_id))
            {
                echo 'no_recipient_sender';
                exit();
            }
            $recipient_user_id = $telephone->getUserId($recipient_phone);

            if(@!$call_cost_for_one_minute = (new Operator())->getCostForOneMinute($sender_operator_id, $recipient_operator_id))
            {
                echo 'no_rel';
                exit();
            }

            $call_duration_minutes = ceil($call_duration/60);
            $call_cost = $call_duration_minutes * $call_cost_for_one_minute;

            $res = (new Call())->addCall($sender_user_id, $recipient_user_id, $start_time, $end_time, $call_duration, $call_cost);

            if($res)
                echo 'ok';
            else echo 'false';

        }
        else
        {
            echo 'Массив $_POST пустой!';
        }
        exit();
    }

    public function remove()
    {
        if($_POST['id'])
        {
            $res = (new Call())->removeCall($_POST['id']);

            if($res)
                echo 'ok';
            else echo 'false';
        }
        exit();
    }
}