<?php

/**
 * 
 */
namespace engine\modules;

use engine\classes\Module;

class OrdersModule extends Module{
	
	
	public function allView(){

		$plist = $this->ordersList();

		$template = $this->twig->loadTemplate('admin/pall_template.tpl');
		return $template->render(array('plist' => $plist));
	}

	public function infoView(){
		$plist = $this->load_order_details($this->route['id']);

		$template = $this->twig->loadTemplate('admin/pall_template.tpl');
		return $template->render(array('plist' => $plist));
	}

	private function ordersList(){
		$orders = $this->dataBase->findAll('orders');
		foreach ($orders as $key => $order) {
			$render .= $this->loadOrder($order);
		}
		return $render;
	}

	private function loadOrder($order){
		$template = $this->twig->loadTemplate('admin/order.tpl');
		return $template->render(array(
																		'id' => $order[id],
																		'data' => $order[data_order],
																		'price' => $order[total_sum],
																		'status' => $order[status],
																		'address' => $order[address],
																	));
	}

	private function load_order_details($id){

		$order = $this->dataBase->findOne( 'orders', 'id = ? ', [ $id ] );
		$list = $this->product_ordered_list($order['id']);

		$template = $this->twig->loadTemplate('admin/order_details.tpl');
		return $template->render(array(
																		'id' => $order['id'],
																		'date' => $order['data_order'],
																		'total_sum' => $order['total_sum'],
																		'address' => $order['address'],
																		'list' => $list,
																	));

	}

	private function product_ordered_list($id){
		$POList = $this->dataBase->find( 'productordered', ' order_id = ? ', [$id]);

		foreach ($POList as $key => $prod_ord) {
			$list .= $this->product_ordered($prod_ord);
		}

		return $list;

	}

	private function product_ordered($prod_ord){

		$product = $this->dataBase->findOne( 'product', 'id = ? ', [ $prod_ord['product_id'] ] );

		$template = $this->twig->loadTemplate('admin/product_ordered.tpl');
		return $template->render(array(
																		'name' => $product['product_name'],
																		'quantity' => $prod_ord['quantity_product'],
																		'price' => $prod_ord['product_price'],
																	));
	}

	
}