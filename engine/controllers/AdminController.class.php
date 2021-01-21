<?php

namespace engine\controllers;

use engine\classes\Controller;
use engine\modules\PortfolioModule;

class AdminController extends Controller{
		
	public function indexAction(){

        return 'главная админ';
	}


  //--Portfolio
  public function get_list_portfolioAction(){
    $portfolio = new PortfolioModule($this->dataBase, $this->route);
    return $portfolio->get_json_a_list($_POST['count']);
  }

  public function upload_img_portfolioAction() {
    $portfolio = new PortfolioModule($this->dataBase, $this->route);
    return json_encode($portfolio->upload_img());
  }

  public function add_new_portfolioAction() {
    $portfolio = new PortfolioModule($this->dataBase, $this->route);

    $id = $portfolio->add_new_portfolio($_POST);
    if($id){
      $answer['state'] = 'ready';
      $answer['id'] = $id;
      return json_encode($answer);
    }
    $answer['error'] = 'Ошибка';
	  return json_encode($answer);
  }

  public function get_data_portfolioAction() {
    $portfolio = new PortfolioModule($this->dataBase, $this->route);
    return $portfolio->get_json_data($this->route['id']);
  }

  public function update_portfolioAction() {
    $portfolio = new PortfolioModule($this->dataBase, $this->route);
    $id = $portfolio->update_data($_POST, $this->route['id']);
    if($id){
      $answer['state'] = 'ready';
      $answer['id'] = $id;
      return json_encode($answer);
    }
    $answer['error'] = 'Ошибка';
    return json_encode($answer);
  }

  public function delete_portfolioAction(){
    $portfolio = new PortfolioModule($this->dataBase, $this->route);
    $r = $portfolio->delete_portfolio($this->route['id']);
    if($r == 1) $answer['state'] = 'ready';
    else $answer['error'] = 'Ошибка';
    return json_encode($answer);
  }
  //--End Portfolio

}