<?php
	use \Core\Route;
	
	return [
        new Route('/', 'main', 'index'),
        new Route('/call/add', 'call', 'add'),
        new Route('/call/remove', 'call', 'remove'),
        new Route('/user/add', 'user', 'addUser'),
        new Route('/user/remove', 'user', 'removeUser'),
        new Route('/user/updatephone', 'user', 'updatePhoneNumber'),
        new Route('/operator/update', 'operator', 'addOrUpdateOperatorRelation'),
        new Route('/operator/add', 'operator', 'addnewoperator'),
        new Route('/operator/remove', 'operator', 'remove'),
        new Route('/operator/user_statistic', 'operator', 'statisticUserTalk'),
        new Route('/operator/one_day_statistic', 'operator', 'oneDayCallsCount'),
	];
	
