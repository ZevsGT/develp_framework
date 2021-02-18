<?php
namespace engine\classes;

class Module{

	protected $twig;
	protected $dataBase;
	protected $route;
  private $config;
	
	function __construct($dataBase, $route = null, $twig = null){
		$this->twig = $twig;
		$this->dataBase = $dataBase;
		$this->route = $route;
	}

	public function addConfig($config) {
	  $this->config = $config;
  }

  public function getConfig() {
    return $this->config;
  }

}