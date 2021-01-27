<?php
namespace engine\modules;

use engine\classes\Module;

class OrdersModule extends Module {
  public function newOrder($data){
    $order = $this->dataBase->dispense( 'orders' );
    $order->email = $data->email;
    $order->message = $data->message;
    return $this->dataBase->store($order);
  }
}