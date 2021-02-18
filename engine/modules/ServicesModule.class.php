<?php
namespace engine\modules;

use engine\classes\FileUploader;
use engine\classes\Module;

class ServicesModule extends Module{

  public function get_json_list(){
    $services = $this->dataBase->getAll( 'SELECT id, title, short_description, bg_color, bg_img FROM services WHERE disabled != 1' );
    return json_encode($services, JSON_NUMERIC_CHECK);
  }

  public function get_service($id){
    $service = $this->dataBase->getAll('SELECT id, title, description, seo_title, seo_description, switch_services FROM services WHERE id = ?', [$id]);
    if(!$service) return null;
    $service[0]['description'] = gzuncompress(base64_decode($service[0]['description']));
    if($service[0]['switch_services'])
      $service[0]['child_services'] = $this->load_sub_service($id);
    return $service[0];
  }

  public function get_list_in_admin($count) {
    $services = $this->dataBase->getAll('
      SELECT id,title 
      FROM services
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );
    return $services;
  }

  public function new_services($data) {
    $services = $this->dataBase->dispense('services');
    $services->title = $data->title;
    $services->description = base64_encode(gzcompress($data->description, 9));
    $services->short_description = $data->short_description;
    $services->switch_services = $data->switch_services;
    $services->bg_color = $data->bg_color;
    $services->bg_img = $data->bg_img;
    $services->disabled = $data->disabled;
    $services->seo_title = $data->seo_title;
    $services->seo_description = $data->seo_description;
    $service_id = $this->dataBase->store($services);

    if($data->switch_services) {
      $service = $this->dataBase->load('services', $service_id);
      foreach ($data->child_services as $data_service) {
        $this->new_sub_service($data_service, $service);
      }
    }
    return $service_id;
  }

  public function get_data_edit($id) {
    $service = $this->dataBase->load('services', $id);
    $service->description = gzuncompress(base64_decode($service->description));
    $service->child_services = $this->load_sub_service($id);

    return $service;
  }

  public function store_data($data) {
    $service = $this->dataBase->load('services', $data->id);
    $service->title = $data->title;
    $service->description = base64_encode(gzcompress($data->description, 9));
    $service->short_description = $data->short_description;
    $service->switch_services = $data->switch_services;
    $service->bg_color = $data->bg_color;
    $service->bg_img = $data->bg_img;
    $service->disabled = $data->disabled;
    $service->seo_title = $data->seo_title;
    $service->seo_description = $data->seo_description;

    foreach ($data->child_services as $service_d) {
      if($service_d->id) $this->store_sub_service($service_d);
      else $this->new_sub_service($service_d, $service);
    }

    return $this->dataBase->store($service);
  }

  private function load_sub_service ($id) {
    $sub_services = $this->dataBase->find('sub_services', 'service_id = ?', [$id]);
    foreach ($sub_services as $service) {
      $service->description = gzuncompress(base64_decode($service->description));
      $service->full_description = gzuncompress(base64_decode($service->full_description));
    }
    return $sub_services;
  }

  public function delete_sub_service($id) {
    $service = $this->dataBase->load('sub_services', $id);
    return $this->dataBase->trash( $service );
  }

  public function delete_service($id) {
    $service = $this->dataBase->load('services', $id);
    return $this->dataBase->trash( $service );
  }

  public function upload_img(){
    $img_upload = new FileUploader(
      'img',
      [
        'maxsize' => 600,
        'maxheight' => 600,
      ],
      'uploads/services'
      );
    return $img_upload->upload_img($_FILES['img_file']);
  }

  private function new_sub_service($data, $service) {
    $sub_service = $this->dataBase->getRedBean()->dispense('sub_services');
    $sub_service->title = $data->title;
    $sub_service->price = $data->price;
    $sub_service->description = base64_encode(gzcompress($data->description, 9));
    $sub_service->full_description = base64_encode(gzcompress($data->full_description, 9));
    $sub_service->service = $service;
    $sub_service->seo_title = $data->seo_title;
    $sub_service->seo_description = $data->seo_description;
    $this->dataBase->store($sub_service);
  }

  private function store_sub_service($data) {
    $sub_service = $this->dataBase->load('sub_services', $data->id);
    $sub_service->title = $data->title;
    $sub_service->price = $data->price;
    $sub_service->description = base64_encode(gzcompress($data->description, 9));
    $sub_service->full_description = base64_encode(gzcompress($data->full_description, 9));
    $sub_service->seo_title = $data->seo_title;
    $sub_service->seo_description = $data->seo_description;
    $this->dataBase->store($sub_service);
  }

}