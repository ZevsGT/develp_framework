<?php

/**
 * 
 */

namespace engine\classes;
use engine\classes\ACL;
include $_SERVER['DOCUMENT_ROOT'].'/engine/lib/rb.php';
use R;


class Router {

	private $routes = [];
  private $params = [];
  private $url;
  private $config;
  private $dataBase;
	
	public function __construct(){
    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/engine/data/routes.xml')) {
    // если файл существует, то подключаемся к нему
      $routes = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/engine/data/routes.xml");
      $this->config = include $_SERVER['DOCUMENT_ROOT'].'/engine/data/config.php';
      $db = 'mysql:host='.$this->config['host'].';dbname='.$this->config['dbname'];
      $this->dataBase = new R();
      $this->dataBase->setup( $db, $this->config['dbuser'], $this->config['dbpassword']);
    } else {
      // если файл не существует, выводим ошибку
      exit('error: Файл routes не найден!');
    }

    foreach ($routes as $key => $value) {
        $this->add($value['src'], $value, $value['cache'], $value['cache-time']);
    }

    unset($routes);
	}

	private function add($route, $params, $cache, $cache_time){
		$route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', (string)$route);
		$route = '#^'.$route.'$#';
		$this->routes[$route]['controller'] = (string)$params->controller;
    $this->routes[$route]['action'] = (string)$params->action;
    $this->routes[$route]['cache'] = (string)$cache;
    $this->routes[$route]['cache-time'] = (string)$cache_time;
	}

	private function ACL_validate(){
	  if($this->url == '') return true;//если главная страница

		$ACL = new ACL($this->params, $this->config, $this->dataBase);
		if($ACL->start()) {
		  if($ACL->getResponse()['status']) $this->params['ACL_RESPONSE'] = $ACL->getResponse();
		  return true;
		}
		else{
      exit(json_encode(['ACL_RESPONSE'=>$ACL->getResponse()]));
		}
	}

	private function match(){
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
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$this->config['spa']['spa_load'])) {
      $document = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $this->config['spa']['spa_load']);
      if (!stripos($_SERVER['REQUEST_URI'], 'admin')) {
        $cache = new Accelerator('engine/cache/pages', $_SERVER['REQUEST_URI'], '.cache');
        $cache_mess = $cache->check_cache_exist(true);
        if($cache_mess == 'CACHE_EXIST') {
          $data_cache = json_decode($cache->get_cache_contents());
          return str_replace([
            '{#title#}',
            '{#description#}',
            '{#app#}'
          ],
          [
            $data_cache->title,
            $data_cache->description,
            $data_cache->app
          ], $document);
        }
      }

      return str_replace([
        '{#title#}',
        '{#description#}',
        '{#app#}'
      ],
      [
        $this->config['home_title'],
        $this->config['home_description'],
        ''
      ], $document);
    }
    else exit('error:spa Файл не найден!');
  }

  private function isset_data_request(){
    if(isset(getallheaders()['Accept']) && getallheaders()['Accept'] === 'application/json') {
      if(isset(getallheaders()['X-Client-Time'])) $this->getDifferenceTime(getallheaders()['X-Client-Time']);
      $data = file_get_contents('php://input');
      $_POST = json_decode($data);
      return true;
    }

    if(isset(getallheaders()['Content-Type']) && getallheaders()['Content-Type'] === 'multipart/form-data') return true;
    if(count($_POST) > 0) return true;
    if(count($_GET) > 0) return true;
    return false;
  }

	public function run(){
    if($this->config['spa']['spa_mode'] && !$this->isset_data_request()){
      echo $this->load_apa_template();
    }else {
      if ($this->match()) {
        if ($this->ACL_validate()) {
          $controller = 'engine\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
          if (class_exists($controller)) {
            $action = $this->params['action'] . 'Action';
            if (method_exists($controller, $action)) {

              $controller = new $controller($this->params, $this->dataBase);
              echo $controller->$action();

            } else {
              exit('action not found');
            }
          } else {
            exit("не найден module: " . $controller);
          }
        }
      } else {
        exit("not found 404");
      }
    }
	}

	private function getDifferenceTime($clientTime) {
    $clientTime = (int)($clientTime/1000);
    $time['DifferenceTime'] = $clientTime- time();
    exit(json_encode($time,JSON_NUMERIC_CHECK));
  }
 
}