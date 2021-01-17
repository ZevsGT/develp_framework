<?php
namespace engine\classes;

class Module{

	protected $twig;
	protected $dataBase;
	protected $route;
	
	function __construct($dataBase, $route, $twig = null){
		$this->twig = $twig;
		$this->dataBase = $dataBase;
		$this->route = $route;
	}

}