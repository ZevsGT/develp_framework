<?php

namespace engine\controllers;

use engine\classes\Controller;


class CartController extends Controller{
	
	
	public function cartaddAction(){
		$code = $this->addP($_POST['id']);
		$result['code'] = $code;

		if($code == 'new_elem'){
			$result['html'] = $this->load_cart_item($_POST['id'], $_SESSION['cart_list'][$_POST['id']], 'cart_item.tpl');
		}else {
			$result['id'] = (int)$_POST['id'];
			$result['num'] =  $_SESSION['cart_list'][$_POST['id']];
		}
        return json_encode($result);
	}

	public function cartdelAction(){
		unset($_SESSION['cart_list'][$_POST['id']]);
		if($_POST['flag'] == 'count') $result['sum_price'] = $this->sum_count($_SESSION['cart_list']);
		$result['code'] = 'success';
		$result['id'] = $_POST['id'];
        return json_encode($result);
	}

	public function ordersAction(){
		$site_path = $this->config['http_home_url'].'/templates/'.$this->config['theme'];

		if(isset($_POST['stage'])){
			exit($this->make_an_order($_POST));
		}

		$content = $this->load_product_list();
		$template = $this->twig->loadTemplate($this->config['theme'].'/'.'orders.tpl');
        return $template->render(array(
																	'content' => $content, 
																	'site_path' => $site_path,
																));

	}

	private function make_an_order($data){

		$order = $this->dataBase->dispense( 'orders' );
		$order->dataOrder = date('c');
		$order->totalSum = $this->sum_count($_SESSION['cart_list']);
		$order->status = 'Поступил';
		$order->address = $data['address'];
		$id = $this->dataBase->store( $order );
		$this->add_products_list($_SESSION['cart_list'], $id);

		$result['code'] = 'done';
		$result['message'] = 'Заказ принят';

		unset($_SESSION['cart_list']);

		return json_encode($result);
	}

	private function add_products_list($list, $id){
		foreach ($list as $key => $value) {
			$item = $this->dataBase->findOne( 'product', 'id = ? ', [ $key ] );
			$this->orderedProduct($id ,$item, $value);
		}
	}

	private function orderedProduct($id, $product, $Quantity){

		$order = $this->dataBase->findOne( 'orders', 'id = ?', [ $id ] );

		$op = $this->dataBase->dispense( 'productordered' );
		$op->order = $order;
		$op->product = $product;
		$op->product_price = $product['price'];
		$op->quantity_product = $Quantity;
		$this->dataBase->store( $op );
	}

	private function load_product_list(){

		if(empty($_SESSION['cart_list'])) $product_list = '<h4>Корзина пуста!</4>';
		else {
			foreach ($_SESSION['cart_list'] as $key => $value) {
				$product_list .= $this->load_product_item($key, $value, 'orders_product_item.tpl');
			}	
		}

		$template = $this->twig->loadTemplate($this->config['theme'].'/'.'orders_product_list.tpl');
		return $template->render(array(
																	'product_list' => $product_list,
																	'total_sum' => $this->sum_count($_SESSION['cart_list']),
																));
	}

	private function sum_count($list){
		foreach ($list as $key => $value) {
			$item = $this->dataBase->findOne( 'product', 'id = ? ', [ $key ] );
			$count +=  $item['price'] * $value;
		}
		return $count;
	}

	private function load_product_item($id, $num, $template){
		$item = $this->dataBase->findOne( 'product', 'id = ? ', [ $id ] );

		$template = $this->twig->loadTemplate($this->config['theme'].'/'.$template);
		return $template->render(array(
																	'name' => $item['product_name'],
																	'num' => $num,
																	'price' => $item['price'],
																	'id' => $item['id'],
																	'img' => $item['img_url'],
																));
	}

	private function addP($id){
		if ($_SESSION['cart_list'][$id] != null) {
			$_SESSION['cart_list'][$id] += 1;
			return 'up_elem';
		}else {
			$_SESSION['cart_list'][$id] = 1;
			return 'new_elem';
		}
	}

}