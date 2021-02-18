<?php

namespace engine\classes;
use Twig_Environment;
use Twig_Loader_Filesystem;

class Controller{

	protected $route;
	protected $twig;
	protected $config;
	protected $dataBase;
	protected $language;
	
	function __construct($route, $dataBase){
    $this->route = $route;
    $this->config = include $_SERVER['DOCUMENT_ROOT'].'/engine/data/config.php';
    if(!$this->config['spa']['spa_mode']) {
      $loader = new Twig_Loader_Filesystem('templates');
      $this->twig = new Twig_Environment($loader, $this->config['twig_options']);
    }
    $this->dataBase = $dataBase;
	}

	protected function response_data_JSON($status, $data = null, $status_code = null, $message = null){
	  if($status) $response['status'] = 'ready';
	  else $response['status'] = 'error';
    if($message) $response['message'] = $message;
    if($data) $response['data'] = $data;
    if($status_code) $response['status_code'] = $status_code;
    if(isset($this->route['ACL_RESPONSE'])) $response['ACL_RESPONSE'] = $this->route['ACL_RESPONSE'];
    return json_encode($response, JSON_NUMERIC_CHECK);
  }

}