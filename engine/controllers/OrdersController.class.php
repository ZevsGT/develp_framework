<?php
namespace engine\controllers;

use engine\classes\Controller;
use engine\modules\OrdersModule;
use engine\modules\ServicesModule;

class OrdersController extends Controller {

  public function newOrderAction() {
    $order = new OrdersModule($this->dataBase);
    $order->addConfig($this->config);
    if($order->newOrder($_POST)) {
      $answer['state'] = 'ready';
      return json_encode($answer);
    } else {
      $answer['error'] = 'Ошибка';
      return json_encode($answer);
    }
  }

  public function getOrdersListAction() {
    $orders = new OrdersModule($this->dataBase);
    $answer['status'] = 'ready';
    $answer['orders_list'] = $orders->get_order_list($_POST->count);
    return json_encode($answer, JSON_NUMERIC_CHECK);
  }

  public function getServiceAction() {
    $service = new ServicesModule($this->dataBase);
    $answer['status'] = 'ready';
    $answer['data'] = $service->get_service($this->route['id']);
    return json_encode($answer, JSON_NUMERIC_CHECK);
  }
}
