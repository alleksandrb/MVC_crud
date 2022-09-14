<?php

namespace Project\Models;

use Core\Model;

class Telephone extends Model
{
    public function getAllPhonesNumber()
    {
        return $this->findMany(" SELECT phone_number FROM telephone");
    }

    public function getOperatorId($telephone)
    {
        return $this->findOne(" SELECT operator_id FROM telephone WHERE phone_number = $telephone ")['operator_id'];
    }

    public function getUserId($telephone)
    {
        if($res = $this->findOne("SELECT user_id FROM telephone WHERE phone_number = $telephone"))
            return $res['user_id'];
        else return false;
    }

    public function addNewTelephone($user_id, $phone_number, $operator_id)
    {
        return $this->setOne("INSERT INTO telephone (user_id, phone_number, operator_id) VALUES ($user_id, $phone_number, $operator_id)");
    }

    public function updatePhoneNumber($old_number, $new_number, $operator)
    {
        return $this->setOne("UPDATE telephone SET phone_number=$new_number, operator_id=$operator WHERE phone_number=$old_number");
    }

    public function removeTelephone($telephone)
    {
        return $this->setOne("DELETE FROM telephone WHERE phone_number = $telephone");
    }

    public function countOfOperatorUsers($operator_id)
    {
        return $this->findMany("SELECT user_id FROM telephone WHERE operator_id = $operator_id");
    }
}