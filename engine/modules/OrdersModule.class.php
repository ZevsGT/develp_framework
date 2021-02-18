<?php
namespace engine\modules;

use engine\classes\Module;

class OrdersModule extends Module {
  public function newOrder($data){
    $order = $this->dataBase->dispense( 'orders' );
    if(isset($data->email)) $order->email_or_phone = $data->email;
    if(isset($data->message)) $order->message = $data->message;
    if(isset($data->fio)) $order->fio = $data->fio;
    if(isset($data->service_id)) $order->service_id = $data->service_id;
    if(isset($data->child_s_id)) $order->child_s_id = $data->child_s_id;
    if(isset($data->email_or_phone)) $order->email_or_phone = $data->email_or_phone;
    $to = $this->getConfig()['email'];
    $subject = 'Develp - Новая заявка от: ' . $order->email_or_phone;
    $message = 'Сообщение от: ' . $order->email_or_phone . "<br>";
    $message .= 'Сообщение: ' . $order->message;
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Менеджер Develp <".$this->getConfig()['email'].">\r\n";
    //$headers .= "Reply-To: Develp.ru@yandex.ru\r\n";
    mail($to, $subject, $message, $headers);
    return $this->dataBase->store($order);
  }

  public function get_order_list($count) {
    return $this->dataBase->getAll('
      SELECT *
      FROM orders
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );
  }
}