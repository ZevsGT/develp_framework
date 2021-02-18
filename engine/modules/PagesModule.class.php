<?php
namespace engine\modules;

use engine\classes\Module;

class PagesModule extends Module {
  public function newPages($data){
    $pages = $this->dataBase->dispense( 'pages' );
    $pages->title = $data->title;
    $pages->url_name = $data->url_name;
    $pages->seo_title = $data->seo_title;
    $pages->seo_description = $data->seo_description;
    $pages->data = base64_encode(gzcompress(json_encode($data->data), 9));
    return $this->dataBase->store($pages);
  }

  public function get_pagelist($count) {
    $pages = $this->dataBase->getAll('
      SELECT id,title 
      FROM pages
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );

    return $pages;
  }

  public function get_json_page($name){
    $page = $this->dataBase->findOne( 'pages', ' url_name = ? ', [ $name ]);
    if($page->data != null) $page->data = json_decode(gzuncompress(base64_decode($page->data)));
    return json_encode($page);
  }

  public function get_data_page($id) {
    $pages = $this->dataBase->load('pages', $id);
    if($pages->data != null) $pages->data = json_decode(gzuncompress(base64_decode($pages->data)));
    return $pages;
  }

  public function update_data($id, $data) {
    $pages = $this->dataBase->load('pages', $id);
    if($pages->title != $data->title) $pages->title = $data->title;
    if($pages->url_name != $data->url_name) $pages->url_name = $data->url_name;
    if($pages->seo_title != $data->seo_title) $pages->seo_title = $data->seo_title;
    if($pages->seo_description != $data->seo_description) $pages->seo_description = $data->seo_description;
    $data->data = base64_encode(gzcompress(json_encode($data->data), 9));
    if($pages->data != $data->data) $pages->data = $data->data;
    return $this->dataBase->store($pages);
  }

  public function delete_pages($id){
    $pages = $this->dataBase->load( 'pages', $id );
    return $this->dataBase->trash( $pages );
  }
}