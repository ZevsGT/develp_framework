<?php
namespace engine\classes;

class Module{

	protected $twig;
	protected $dataBase;
	protected $route;
	
	function __construct($twig, $dataBase, $route){
		$this->twig = $twig;
		$this->dataBase = $dataBase;
		$this->route = $route;
	}

}