<?php
namespace Project\Models;
use \Core\Model;
	
class User extends Model
{

    public function getById($id)
    {
        return $this->findOne("SELECT * FROM user WHERE id=$id");
    }

    public function getAll()
    {
        return $this->findMany("SELECT user.*, operator.name as operator, telephone.phone_number as phone FROM user LEFT JOIN telephone ON telephone.user_id = user.id 
                                    LEFT JOIN operator ON operator.id = telephone.operator_id
                                    ORDER BY id DESC");
    }

    public function getByRange($from, $to)
    {
        return $this->findMany("SELECT * FROM user WHERE id>=$from AND id<=$to");
    }

    public function addNewUser($name, $surname)
    {
        $this->setOne("INSERT INTO user (name, surname) VALUES (\"$name\", \"$surname\")");
        return $this->findOne("SELECT id FROM user ORDER BY id DESC LIMIT 1");
    }

    public function removeUser($id)
    {
        return $this->setOne("DELETE FROM user WHERE id = $id");
    }
}
