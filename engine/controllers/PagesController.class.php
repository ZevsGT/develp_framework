<?php
namespace engine\controllers;

use engine\classes\Controller;
use engine\modules\PagesModule;

class PagesController extends Controller {
  public function newPagesAction() {
    $pages = new PagesModule($this->dataBase);
    if($pages->newPages($_POST)) {
      $answer['state'] = 'ready';
      return json_encode($answer);
    } else {
      $answer['error'] = 'Ошибка';
      return json_encode($answer);
    }
  }

  public function getPageListAction() {
    $pages = new PagesModule($this->dataBase);
    $response = $this->route['RESPONSE'];
    $response['list'] = $pages->get_pagelist($_POST['count']);
    return json_encode($response, JSON_NUMERIC_CHECK);
  }

  public function deletePageAction(){
    $pages = new PagesModule($this->dataBase);
    $r = $pages->delete_pages($this->route['id']);
    if($r == 1) $answer['state'] = 'ready';
    else $answer['error'] = 'Ошибка';
    return json_encode($answer);
  }

  public function getPageEditAction() {
    $pages = new PagesModule($this->dataBase);
    return $pages->get_json_data_page($this->route['id']);
  }

  public function getPageAction() {
    $pages = new PagesModule($this->dataBase);
    return $pages->get_json_page($this->route['name']);
  }

  public function updateDataPageAction() {
    $pages = new PagesModule($this->dataBase);
    $id = $pages->update_data($this->route['id'], $_POST);
    if($id){
      $answer['state'] = 'ready';
      $answer['id'] = $id;
      return json_encode($answer);
    }
    $answer['error'] = 'Ошибка';
    return json_encode($answer);
  }

  public function ckeditorImgAction() {
    $a['url'] = 'https://avatars.mds.yandex.net/get-zen_doc/40663/pub_5b66f38715e67900a87d9766_5b66fa14b9dc1000a9eca82a/scale_1200';
    return json_encode($a);
  }
}