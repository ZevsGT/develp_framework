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
  private $config;
	
	public function __construct(){
    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/engine/data/routes.xml')) {
        // если файл существует, то подключаемся к нему
        $routes = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/engine/data/routes.xml");
        $this->config = include $_SERVER['DOCUMENT_ROOT'].'/engine/data/config.php';
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
      header('Location: /admin/login');
      exit;
		}
	}

	public function match(){
    $url = trim($_SERVER['REQUEST_URI'], '/');
		if(count($_GET) > 0) $url = strstr($url,'?', true );
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

	private function load_apa_template(){
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$this->config['spa']['spa_load']))
        include $_SERVER['DOCUMENT_ROOT'].$this->config['spa']['spa_load'];
      else exit('error:spa Файл не найден!');
  }

  private function isset_data_request(){
    $data = file_get_contents('php://input');
    if($data != null) {
      $_POST = json_decode($data);
      return true;
    }
    if(count($_POST) > 0) return true;
    if(count($_GET) > 0) return true;
    return false;
  }

	public function run(){
    if($this->config['spa']['spa_mode'] && !$this->isset_data_request()){
          $this->load_apa_template();
      }else {
          if ($this->match()) {
              if ($this->ACL_validate()) {

                  $controller = 'engine\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
                  if (class_exists($controller)) {
                      $action = $this->params['action'] . 'Action';
                      if (method_exists($controller, $action)) {

                          $controller = new $controller($this->params);
                          echo $controller->$action();


                      } else {
                          exit('action not faoun');
                      }
                  } else {
                      exit("не найден module: " . $controller);
                  }
              }

          } else {
              exit("not faund 404");
          }
      }
	}
 
}