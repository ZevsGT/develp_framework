<?php

namespace engine\controllers;

use engine\classes\Controller;

class CategoryController extends Controller{
	private $NCategory;
	private $tittle;
	
	public function categoryAction(){
			if($this->category_exists($this->route['name'])){
				$site_path = $this->config['http_home_url'].'/templates/'.$this->config['theme'];
				$Productlist =$this->getViewProductList($this->getProductInCategory($this->route['name']), 'product.tpl');
				$content = $this->renderBlockList($Productlist, 'blockView.tpl', $this->NCategory);

				if(isset($_GET['_pjax'])){
					$content .= '<title>'.$this->tittle.'</title>';
                    return $content;
				}

				$template = $this->twig->loadTemplate($this->config['theme'].'/'.'main.tpl');
                return $template->render(array(
																			'content' => $content, 
																			'site_path' => $site_path, 
																			's_tittle' => $this->tittle,
																			'cart_list' => $this->load_cart(),
																		));
			}else return 404;
	}

	public function category_exists($CT){
		$categoryid = $this->dataBase->findOne( 'Category', ' translit = ? ', [ $CT ] );
		if($categoryid) return true;
		else return false;
	}

	public function getProductInCategory($CT){
		$categoryid = $this->dataBase->findOne( 'Category', ' translit = ? ', [ $CT ] );
		$this->NCategory = $categoryid[name];
		$this->tittle = $categoryid[name];
		return $this->dataBase->getAll('SELECT id, product_name, price, description, img_url FROM product WHERE category_id=? ORDER BY id DESC LIMIT 20', [$categoryid[id]]);
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