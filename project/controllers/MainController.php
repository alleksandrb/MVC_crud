<?php

namespace Project\Controllers;

use Core\Controller;
use Project\Models\Call;
use Project\Models\Operator;
use Project\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $this->title = 'Журнал вызовов';

        $users = (new User())->getAll();
        $calls = (new Call())->getAll();
        $operators = (new Operator())->getAll();
        $operators_price_list = (new Operator())->getAllPriceList();

        $operators_tmp = [];
        foreach ($operators as $operator)
            $operators_tmp[$operator['id']] = $operator['name'];
        $operators = $operators_tmp;

        return $this->render('main/index',[
            'users' => $users,
            'calls' => $calls,
            'operators' => $operators,
            'operators_price_list' => $operators_price_list,
        ]);
    }
}