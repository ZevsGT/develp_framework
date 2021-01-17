<?php

namespace engine\classes;

include $_SERVER['DOCUMENT_ROOT'].'/engine/lib/rb.php';

use R;
use Twig_Environment;
use Twig_Loader_Filesystem;

class Controller{

	protected $route;
	protected $twig;
	protected $config;
	protected $dataBase;
	protected $language;
	
	function __construct($route){
    $this->route = $route;
    $this->config = include $_SERVER['DOCUMENT_ROOT'].'/engine/data/config.php';
    if(!$this->config['spa']['spa_mode']) {
      $loader = new Twig_Loader_Filesystem('templates');
      $this->twig = new Twig_Environment($loader, $this->config['twig_options']);
    }
    $db = 'mysql:host='.$this->config['host'].';dbname='.$this->config['dbname'];
    $this->dataBase = new R();
    $this->dataBase->setup( $db, $this->config['dbuser'], $this->config['dbpassword']);
	}

}