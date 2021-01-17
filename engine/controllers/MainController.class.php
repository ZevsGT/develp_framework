<?php
namespace engine\controllers;
use engine\classes\Controller;
use engine\modules\PortfolioModule;
use engine\modules\ServicesModule;
use engine\modules\UsersModule;

class MainController extends Controller{

	public function indexAction(){

	  return 'Home';
	}

	public function get_list_servicesAction() {
    $services_list = new ServicesModule($this->dataBase, $this->route);
    return $services_list->get_json_list();
  }

  public function get_list_workersAction() {
	  $workers = new UsersModule($this->dataBase, $this->route);
	  return $workers->get_json_workers();
  }

  public function get_list_portfolioAction(){
	  $portfolio = new PortfolioModule($this->dataBase, $this->route);
	  return $portfolio->get_json_8_list($_POST->count);
  }

}