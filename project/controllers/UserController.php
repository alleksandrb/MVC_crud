<?php

namespace Project\Controllers;

use Core\Controller;
use Project\Models\Call;
use Project\Models\Operator;
use Project\Models\Telephone;
use Project\Models\User;

class UserController extends Controller
{


    public function addUser()
    {
        //добавление пользователя
        if($_POST)
        {
            $telephones = (new Telephone())->getAllPhonesNumber();
            $phone_number = preg_replace('/(\D)/','', $_POST['phone_number']);

            //проверка существет ли добавляемый пользователь в базе
            foreach ($telephones as $telephone)
            {
                if($telephone['phone_number'] === $phone_number)
                {
                    exit("Пользователь с таким телефоном уже зарегистрирован!");
                }
            }

            $users = new User();
            $user_id = $users->addNewUser($_POST['name'], $_POST['surname'])['id'];

            if($user_id && (new Telephone())->addNewTelephone($user_id, $phone_number, $_POST['operator']))
            {
                echo "ok";
            }
            else echo "false";
        }
        exit();
    }

    public function removeUser()
    {
        //удаление пользователя по его номеру телефона
        if ($_POST['phone_number'])
        {
            $phone_number = preg_replace('/(\D)/','', $_POST['phone_number']);
            $telephone = new Telephone();
            $user_id = $telephone->getUserId($phone_number);
            if(!$user_id) {echo 'no_user'; exit();}

            if( $telephone->removeTelephone($phone_number) &&
            (new User)->removeUser($user_id) ) echo 'ok';
            else echo 'false';
        }
        exit();
    }

    public function updatePhoneNumber()
    {
        //обновление номера телефона пользователя
        if($_POST['new_phone_number'] && $_POST['old_phone_number'] && $_POST['new_phone_operator'])
        {
            $new_phone_number = preg_replace('/(\D)/','', $_POST['new_phone_number']);
            $old_phone_number = preg_replace('/(\D)/','', $_POST['old_phone_number']);
            $operator_id = preg_replace('/(\D)/','', $_POST['new_phone_operator']);
            $telephone = new Telephone();
            if($telephone->updatePhoneNumber( $old_phone_number,$new_phone_number,$operator_id))
            {
                echo 'ok';
            }
            else echo 'false';
        }
        exit();
    }
}