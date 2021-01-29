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

}