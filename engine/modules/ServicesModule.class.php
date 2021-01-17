<?php
namespace engine\modules;

use engine\classes\Module;

class ServicesModule extends Module{

  public function get_json_list(){
    $services = $this->dataBase->getAll( 'SELECT * FROM services' );

    return json_encode($services, JSON_NUMERIC_CHECK);
  }

}