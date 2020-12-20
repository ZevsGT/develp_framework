<?php

/**
 * 
 */

namespace engine\classes;
use engine\classes\ACL;


class Router {

	private $routes = [];
    private $params = [];
    private $url;
	
	public function __construct(){

        if (file_exists($_SERVER['DOCUMENT_ROOT'].'/engine/data/routes.xml')) {
            // если файл существует, то подключаемся к нему
            $routes = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/engine/data/routes.xml");
        } else {
            // если файл не существует, выводим ошибку
            exit('error: Файл routes не найден!');
        }

        foreach ($routes as $key => $value) {
            $this->add($value['src'], $value, $value['cache'], $value['cache-time']);
        }

        unset($routes);
	}

	public function add($route, $params, $cache, $cache_time){
		$route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', (string)$route);
		$route = '#^'.$route.'$#';
		$this->routes[$route]['controller'] = (string)$params->controller;
        $this->routes[$route]['action'] = (string)$params->action;
        $this->routes[$route]['cache'] = (string)$cache;
        $this->routes[$route]['cache-time'] = (string)$cache_time;
	}

	public function ACL_validate(){

        if($this->url == '') return true;//если главная страница

		$ACL = new ACL($this->params);
		if($ACL->start()) return true;
		else{
            $data_broken_url = explode("/", $this->url);
			if($data_broken_url[0] == 'admin'){
                header('Location: /admin/login');
                exit;
			}
		 	else return false;
		}
	}

	public function match(){
		$url = trim($_SERVER['REQUEST_URI'], '/');
		if(isset($_GET['_pjax'])) $url = str_replace('?_pjax=.pjax-container', '', $url);
		$this->url = $url;
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url, $matches)) {
				foreach ($matches as $key => $match) {
					if (is_string($key)) {
						if (is_numeric($match)) {
							$match = (int) $match;
						}
						if (is_string($match)) {
							$match = (string) $match;
						}
						$params[$key] = $match;
					}	
				}
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function run(){
		if ($this->match()) {
			if ($this->ACL_validate()){

				$controller = 'engine\controllers\\'.ucfirst($this->params['controller']).'Controller';
				if (class_exists($controller)) {
					$action = $this->params['action'].'Action';
					if (method_exists($controller, $action)) {

                                $controller = new $controller($this->params);
                                echo $controller->$action();


					}else {
                        exit('action not faoun');
					}
				}else {
                    exit("не найден module: " . $controller);
				}
			}else {
                exit("not faund 404 или у вас не достаточно прав");
			}

		}else {
            exit("not faund 404");
		}
	}
 
}