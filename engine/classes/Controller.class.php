<?php

namespace engine\classes;

include $_SERVER['DOCUMENT_ROOT'].'/engine/lib/rb.php';

use engine\classes\Translit;
use R;
use Twig_Environment;
use Twig_Loader_Filesystem;
use engine\classes\Language;

class Controller{

	protected $route;
	protected $twig;
	protected $config;
	protected $dataBase;
	protected $language;
	
	function __construct($route){

        $this->route = $route;
        $this->config = include $_SERVER['DOCUMENT_ROOT'].'/engine/data/config.php';
        $loader = new Twig_Loader_Filesystem('templates');
        $this->twig = new Twig_Environment($loader, $this->config['twig_options']);
        $db = 'mysql:host='.$this->config['host'].';dbname='.$this->config['dbname'];
        $this->dataBase = new R();
        $this->dataBase->setup( $db, $this->config['dbuser'], $this->config['dbpassword']);
        $this->language = new Language();
	}

	protected function load_cart(){

		if($_SESSION['cart_list'] != null){
			foreach ($_SESSION['cart_list'] as $key => $value) {
				$render .= $this->load_cart_item($key, $value, 'cart_item.tpl');
			}
			return $render;
		}
	}


	protected function load_cart_item($id, $num, $template){
		$item = $this->dataBase->findOne( 'product', 'id = ? ', [ $id ] );
		$template = $this->twig->loadTemplate($this->config['theme'].'/'.$template);

		return $template->render(array(
																		'ProductName' => $item['product_name'],
																		'Price' => $item['price'],
																		'img' => $this->config['http_home_url'].'/uploads/'.$item['img_url'],
																		'id' => $id,
																		'number' => $num,
																	));
	}

    protected function load_module($Module, $View){
        $module = 'engine\modules\\'.ucfirst($Module).'Module';
        if (class_exists($module)) {
            $view = $View.'View';
            if (method_exists($module, $view)) {
                $module = new $module($this->twig, $this->dataBase, $this->route);
                return $module->$view();
            }else {
                return "View not found";
            }
        }else {
            return "opss module not faund".$module;
        }
    }

}