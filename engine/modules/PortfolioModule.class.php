<?php
namespace engine\modules;

use engine\classes\Module;

class PortfolioModule extends Module {

  public function get_json_8_list($count) {
    $portfolio = $this->dataBase->getAll('
      SELECT id,title,description,color,src_preview 
      FROM portfolio
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );

    return json_encode($portfolio, JSON_NUMERIC_CHECK);
  }

  public function get_json_a_list($count) {
    $portfolio = $this->dataBase->getAll('
      SELECT id,title,src_preview 
      FROM portfolio
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );

    return json_encode($portfolio, JSON_NUMERIC_CHECK);
  }

}