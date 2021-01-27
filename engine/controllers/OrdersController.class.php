<?php
namespace engine\controllers;

use engine\classes\Controller;
use engine\modules\OrdersModule;

class OrdersController extends Controller {

  public function newOrderAction() {
    $order = new OrdersModule($this->dataBase);
    if($order->newOrder($_POST)) {
      $answer['state'] = 'ready';
      return json_encode($answer);
    } else {
      $answer['error'] = 'Ошибка';
      return json_encode($answer);
    }
  }

}
