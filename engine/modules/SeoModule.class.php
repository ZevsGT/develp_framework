<?php

namespace engine\modules;

use engine\classes\Module;

class SeoModule extends Module {
  public static function getDataSeo($id, $dataBase) {
    $seo = $dataBase->load('seo', $id);
    return $seo;
  }

  public static function newSeo($data, $dataBase) {
    $seo = $dataBase->dispense('seo');
    $seo->title = $data->title;
    $seo->description = $data->description;
    return $seo;
  }

  public function storeNewSeo($data) {
    $seo = $this->dataBase->dispense('seo');
    $seo->title = $data->title;
    $seo->description = $data->description;
    return $this->dataBase->store($seo);
  }

  public static function updateDataSeo($data, $dataBase) {
    $seo = $dataBase->load('seo', $data->id);
    $seo->title = $data->title;
    $seo->description = $data->description;
    return $seo;
  }

  public static function storeUpdateDataSeo($data, $dataBase) {
    $seo = $dataBase->load('seo', $data->id);
    $seo->title = $data->title;
    $seo->description = $data->description;
    return $dataBase->store($seo);
  }
}