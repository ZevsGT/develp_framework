<?php

/**
 * 
 */
namespace engine\modules;

use engine\classes\Module;

class ProductModule extends Module{
	
	public function addView(){

		if(isset($_POST[submit])){
			$this->addProduct($_POST);
			return 'Продукт добавлен';
		}

		$template = $this->twig->loadTemplate('admin/product_form.tpl');
		$category = $this->loadCategory();
		return $template->render(array('category' => $category));
	}

	public function editView(){

		if(isset($_POST[submit])){
			$this->editProduct($_POST, $this->route['id']);
			return 'Продукт отредактирован!';
		}

		$product = $this->dataBase->findOne( 'product', ' id = ? ', [ $this->route['id'] ] );
		//print_r($product);
		$template = $this->twig->loadTemplate('admin/product_form.tpl');
		$category = $this->loadCategory();
		return $template->render(array(
																		'category' => $category,
																		'productName' => $product['product_name'],
																		'price' => $product['price'],
																		'description' => $product['description'],
																	));
	}

	public function allView(){

		if(isset($_POST[delproduct])){
			if ($this->delete_product($_POST[id])) {
				$answer[code] = 'done';
				$answer[id] = $_POST[id];
			}else {
				$answer[code] = 'error 404';
			}
			return json_encode($answer);
		}

		$plist = $this->productList();

		$template = $this->twig->loadTemplate('admin/pall_template.tpl');
		return $template->render(array('plist' => $plist));
	}

	private function productList(){
		$product = $this->dataBase->findAll('product');
		foreach ($product as $key => $value) {
			$category = $this->dataBase->load('Category', $product[$key][category_id]);
			$render .= $this->loadProduct($product[$key][id], $product[$key][product_name], $category[name]);
		}
		return $render;
	}

	private function delete_product($id){
		$product = $this->dataBase->findOne( 'product', ' id = ? ', [ $id ] );
		if($product){
			$this->dataBase->trash($product);
			return true;
		}else return false;
	}

	private function loadProduct($id, $name, $category){
		$template = $this->twig->loadTemplate('admin/product.tpl');
		return $template->render(array(
																		'id' => $id,
																		'name' => $name,
																		'category' => $category,
																	));
	}

	private function addProduct($params){
		$product = $this->dataBase->dispense('product');
		$product->productName = $params[productName];
		$product->category = $this->dataBase->load('Category',$params[category]);
		$product->description = $params[description];
		$product->users = $this->dataBase->load('userGroup',$_SESSION['user']['id_group']);
		if(isset($params[popular])) $product->popular = true;
		else $product->popular = false;
		$product->price = $params[price];
		$product->imgUrl = '49c9bd34-f725-400d-bca5-81e6c8bacc76.jpg';
		$this->dataBase->store( $product );
	}

	private function editProduct($params, $id){
		$product = $this->dataBase->findOne( 'product', ' id = ? ', [ $this->route['id'] ] );
		$product->productName = $params[productName];
		$product->category = $this->dataBase->load('Category',$params[category]);
		$product->description = $params[description];
		$product->users = $this->dataBase->load('userGroup',$_SESSION['user']['id_group']);
		if(isset($params[popular])) $product->popular = true;
		else $product->popular = false;
		$product->price = $params[price];
		//$product->imgUrl = '49c9bd34-f725-400d-bca5-81e6c8bacc76.jpg';
		$this->dataBase->store( $product );
	}

	private function loadCategory(){
		$category = $this->dataBase->findAll('Category');
		//print_r($category);
		foreach ($category as $key => $value) {
			$view .= '<option value='.$category[$key][id].'>'.$category[$key][name].'</option>';
		}
		return $view;
	}



}