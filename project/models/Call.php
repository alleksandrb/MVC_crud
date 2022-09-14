<?php

namespace Project\Models;

use Core\Model;

class Call extends Model
{
    private $table_name;
    public function __construct()
    {
        $this->table_name = "call_log";
        parent::__construct();
    }

    public function getById($id)
    {
        return $this->findOne("SELECT * FROM $this->table_name WHERE id=$id");
    }

    public function getAll()
    {
        return $this->findMany("SELECT * FROM $this->table_name ORDER BY id DESC");
    }
    public function getAllInOneDay($day)
    {
        return $this->findMany("SELECT sender FROM $this->table_name  WHERE start_time >= \"$day 00:00:00\" AND start_time <= \"$day 23:59:59\"");
    }

    public function getByRange($from, $to)
    {
        return $this->findMany("SELECT * FROM $this->table_name WHERE id>=$from AND id<=$to");
    }

    public function addCall($sender_id, $recipient_id, $start_time, $end_time, $call_duration, $cost)
    {
        return $this->setOne("INSERT INTO $this->table_name (sender, recipient, start_time, end_time, call_duration, cost) VALUES ( $sender_id, $recipient_id, \"$start_time\", \"$end_time\", $call_duration, $cost )");
    }

    public function removeCall($id)
    {
        return $this->setOne("DELETE FROM $this->table_name WHERE id = $id ");
    }

}