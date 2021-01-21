<?php
namespace engine\modules;

use engine\classes\FileUploader;
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

  public function add_new_portfolio($data){
    $portfolio = $this->dataBase->dispense( 'portfolio' );
    $portfolio->title = $data->title;
    $portfolio->description = $data->description;
    $portfolio->color = $data->color;
    $portfolio->src_preview = $data->src_preview;
    $portfolio->body = base64_encode(gzcompress(json_encode($data->body), 9));
    return $this->dataBase->store($portfolio);
  }

  public function get_json_data($id) {
    $portfolio = $this->dataBase->load( 'portfolio', $id );
    if($portfolio->body != null)
    $portfolio->body = json_decode(gzuncompress(base64_decode($portfolio->body)));
    return json_encode($portfolio);
  }

  public function update_data($data, $id) {
    $portfolio = $this->dataBase->load( 'portfolio', $id );
    if($portfolio->title != $data->title) $portfolio->title = $data->title;
    if($portfolio->description != $data->description) $portfolio->description = $data->description;
    if($portfolio->color != $data->color) $portfolio->color = $data->color;
    if($portfolio->src_preview != $data->src_preview) $portfolio->src_preview = $data->src_preview;
    $body = base64_encode(gzcompress(json_encode($data->body), 9));
    if($portfolio->body != $body) $portfolio->body = $body;
    return $this->dataBase->store($portfolio);
  }

  public function delete_portfolio($id){
    $portfolio = $this->dataBase->load( 'portfolio', $id );
    return $this->dataBase->trash( $portfolio );
  }

  public function upload_img(){

    $img_upload = new FileUploader(
      'img',
      'uploads/portfolio',
                  [
                    'maxsize' => 200000,
                    'maxheight' => 20000,
                  ]
      );
    return $img_upload->upload_img($_FILES['img_file']);
  }

}