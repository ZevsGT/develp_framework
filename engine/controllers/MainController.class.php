<?php

namespace engine\controllers;

use engine\classes\Controller;


class MainController extends Controller{
	
	
	public function indexAction(){

		$site_path = $this->config['http_home_url'].'/templates/'.$this->config['theme'];
				
		$Popularlist =$this->getViewProductList($this->getPopular(), 'product.tpl');
		$content = $this->renderBlockList($Popularlist, 'blockView.tpl', 'Популярное');

		$Popularlist =$this->getViewProductList($this->getProductInCategory('Пицца'), 'product.tpl');
		$content .= $this->renderBlockList($Popularlist, 'blockView.tpl', 'Пицца');

		if(isset($_GET['_pjax'])){
			$content .= '<title>'.$this->config['home_title'].'</title>';
            return $content;
		}

		$template = $this->twig->loadTemplate($this->config['theme'].'/'.'main.tpl');
		return $template->render(array(
																	'content' => $content, 
																	'site_path' => $site_path, 
																	's_tittle' => $this->config['home_title'],
																	'cart_list' => $this->load_cart(),
                                                                    'http_url' =>$this->config['http_home_url']
																));
	}

	public function getPopular(){
		return $this->dataBase->getAll('SELECT id, product_name, price, description, img_url FROM product WHERE popular=1');
	}

	public function getProductInCategory($categoryName){
		$categoryid = $this->dataBase->findOne( 'Category', ' name = ? ', [ $categoryName ] );
		return $this->dataBase->getAll('SELECT id, product_name, price, description, img_url FROM Product WHERE Category_id=? ORDER BY id DESC LIMIT 20', [$categoryid['id']]);
	}	

	public function getViewProductList($db, $template){
		$template = $this->twig->loadTemplate($this->config['theme'].'/'.$template);
		foreach ($db as $key => $value) {
			$product .= $template->render(array(
																						'ProductName' => $db[$key]['product_name'],
																						'Description' => $db[$key]['description'],
																						'Price' => $db[$key]['price'],
																						'img' => $this->config['http_home_url'].'/uploads/'.$db[$key]['img_url'],
																						'id' => $db[$key]['id'],
																					));
		}
		return $product;
	}

	public function renderBlockList($ProductList, $template, $BTittle){
		$template = $this->twig->loadTemplate($this->config['theme'].'/'.$template);
		return $template->render(array('List' => $ProductList, 'tittle' => $BTittle));
	}


}