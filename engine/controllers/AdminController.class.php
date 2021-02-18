<?php

namespace engine\controllers;

use engine\classes\Accelerator;
use engine\classes\Controller;
use engine\modules\PortfolioModule;
use engine\modules\ServicesModule;

class AdminController extends Controller{
		
  public function indexAction(){
    return 'главная админ';
  }

  #--Portfolio
  public function get_list_portfolioAction(){
    $portfolio = new PortfolioModule($this->dataBase);
    $response = $this->route['ACL_RESPONSE'];
    $response['list'] = $portfolio->get_a_list($_POST->count);
    return json_encode($response, JSON_NUMERIC_CHECK);
  }

  public function upload_img_portfolioAction() {
    $portfolio = new PortfolioModule($this->dataBase);
    return json_encode($portfolio->upload_img());
  }

  public function add_new_portfolioAction() {
    $portfolio = new PortfolioModule($this->dataBase);

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
    $portfolio = new PortfolioModule($this->dataBase);
    return json_encode($portfolio->get_data($this->route['id']), JSON_NUMERIC_CHECK);
  }

  public function update_portfolioAction() {
    $portfolio = new PortfolioModule($this->dataBase);
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
    $portfolio = new PortfolioModule($this->dataBase);
    $r = $portfolio->delete_portfolio($this->route['id']);
    if($r == 1) $answer['state'] = 'ready';
    else $answer['error'] = 'Ошибка';
    return json_encode($answer);
  }
  #--End Portfolio

  # Services
  public function get_list_servicesAction() {
    $services = new ServicesModule($this->dataBase);
    $answer['status'] = 'ready';
    $answer['list'] = $services->get_list_in_admin($_POST->count);
    return json_encode($answer, JSON_NUMERIC_CHECK);
  }

  public function new_servicesAction() {
    $services = new ServicesModule($this->dataBase);
    $answer['status'] = 'ready';
    $answer['id'] = $services->new_services($_POST);
    return json_encode($answer, JSON_NUMERIC_CHECK);
  }

  public function get_data_edit_serviceAction() {
    $services = new ServicesModule($this->dataBase);
    $answer['status'] = 'ready';
    $answer['data'] = $services->get_data_edit($this->route['id']);
    return json_encode($answer, JSON_NUMERIC_CHECK);
  }

  public function store_data_serviceAction() {
    $services = new ServicesModule($this->dataBase);
    if($services->store_data($_POST)) return $this->response_data_JSON(true, $_POST);
    else return $this->response_data_JSON(false);
  }

  public function upload_img_serviceAction() {
    $services = new ServicesModule($this->dataBase);
    return json_encode($services->upload_img());
  }

  public function delete_sub_serviceAction() {
    $service = new ServicesModule($this->dataBase);
    if($service->delete_sub_service($_POST->id)) return $this->response_data_JSON(true);
    else return $this->response_data_JSON(false);
  }

  public function delete_serviceAction() {
    $service = new ServicesModule($this->dataBase);
    if($service->delete_service($_POST->id)) {
      $answer['status'] = 'ready';
    } else $answer['status'] = 'error';
    return json_encode($answer);
  }

  # End Services

  public function cacheAction() {
    if (stripos($_POST->url, 'admin')) return $this->response_data_JSON(true);
    else {
      $cache = new Accelerator('engine/cache/pages', $_POST->url, '.cache');
      $cache_mess = $cache->check_cache_exist(true);
      if($cache_mess == 'CACHE_EXIST') return $this->response_data_JSON(true);
      else if($cache_mess == 'CACHE_NOT_EXIST') {
        $cache->write_cache(json_encode($_POST));
        return $this->response_data_JSON(true);
      }
    }
  }

}