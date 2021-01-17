<?php

namespace engine\controllers;

use engine\classes\Controller;
use engine\modules\PortfolioModule;

class AdminController extends Controller{
		
	public function indexAction(){

        return 'главная админ';
	}

  public function get_list_portfolioAction(){
    $portfolio = new PortfolioModule($this->dataBase, $this->route);
    return $portfolio->get_json_a_list($_POST->count);
  }

}