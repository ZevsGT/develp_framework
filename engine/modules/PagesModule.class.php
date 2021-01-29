<?php
namespace engine\modules;

use engine\classes\Module;

class PagesModule extends Module {
  public function newPages($data){
    $pages = $this->dataBase->dispense( 'pages' );
    $pages->title = $data->title;
    $pages->url_name = $data->url_name;
    $pages->data = base64_encode(gzcompress(json_encode($data->data), 9));
    return $this->dataBase->store($pages);
  }

  public function get_json_pagelist($count) {
    $pages = $this->dataBase->getAll('
      SELECT id,title 
      FROM pages
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );

    return json_encode($pages, JSON_NUMERIC_CHECK);
  }

  public function get_json_data_page($id) {
    $pages = $this->dataBase->load('pages', $id);
    if($pages->data != null) $pages->data = json_decode(gzuncompress(base64_decode($pages->data)));
    return json_encode($pages);
  }

  public function update_data($id, $data) {
    $pages = $this->dataBase->load('pages', $id);
    if($pages->title != $data->title) $pages->title = $data->title;
    if($pages->url_name != $data->url_name) $pages->url_name = $data->url_name;
    $data->data = base64_encode(gzcompress(json_encode($data->data), 9));
    if($pages->data != $data->data) $pages->data = $data->data;
    return $this->dataBase->store($pages);
  }

  public function delete_pages($id){
    $pages = $this->dataBase->load( 'pages', $id );
    return $this->dataBase->trash( $pages );
  }
}