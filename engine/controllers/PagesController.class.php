<?php
namespace engine\controllers;

use engine\classes\Controller;
use engine\modules\PagesModule;

class PagesController extends Controller {
  public function newPagesAction() {
    $pages = new PagesModule($this->dataBase);
    if($pages->newPages($_POST)) {
      return $this->response_data_JSON(true);
    } else {
      return $this->response_data_JSON(false);
    }
  }

  public function getPageListAction() {
    $pages = new PagesModule($this->dataBase);
    return $this->response_data_JSON(true, $pages->get_pagelist($_POST->count));
  }

  public function deletePageAction(){
    $pages = new PagesModule($this->dataBase);
    $r = $pages->delete_pages($this->route['id']);
    if($r == 1) return $this->response_data_JSON(true);
    else return $this->response_data_JSON(false);
  }

  public function getPageEditAction() {
    $pages = new PagesModule($this->dataBase);
    return $this->response_data_JSON(true, $pages->get_data_page($this->route['id']));
  }

  public function getPageAction() {
    $pages = new PagesModule($this->dataBase);
    return $pages->get_json_page($this->route['name']);
  }

  public function updateDataPageAction() {
    $pages = new PagesModule($this->dataBase);
    $id = $pages->update_data($this->route['id'], $_POST);
    if($id){
      return $this->response_data_JSON(true, $_POST);
    }
    return $this->response_data_JSON(false);
  }

  public function ckeditorImgAction() {
    $a['url'] = 'https://avatars.mds.yandex.net/get-zen_doc/40663/pub_5b66f38715e67900a87d9766_5b66fa14b9dc1000a9eca82a/scale_1200';
    return json_encode($a);
  }
}