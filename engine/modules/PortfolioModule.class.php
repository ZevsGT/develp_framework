<?php
namespace engine\modules;

use engine\classes\FileUploader;
use engine\classes\Module;

class PortfolioModule extends Module {

  public function get_json_8_list($count) {
    $portfolio = $this->dataBase->getAll('
      SELECT id,title,description,color,src_preview, seo_title, seo_description 
      FROM portfolio
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );

    return json_encode($portfolio, JSON_NUMERIC_CHECK);
  }

  public function get_a_list($count) {
    $portfolio = $this->dataBase->getAll('
      SELECT id,title,src_preview 
      FROM portfolio
      ORDER BY id DESC LIMIT ?,8', [ (int)$count ]
    );

    return $portfolio;
  }

  public function add_new_portfolio($data){
    $portfolio = $this->dataBase->dispense( 'portfolio' );
    $portfolio->title = $data->title;
    $portfolio->description = $data->description;
    $portfolio->color = $data->color;
    $portfolio->src_preview = $data->src_preview;
    $portfolio->seo_title = $data->seo_title;
    $portfolio->seo_description = $data->seo_description;
    $portfolio->body = base64_encode(gzcompress(json_encode($data->body), 9));
    return $this->dataBase->store($portfolio);
  }

  public function get_data($id) {
    $portfolio = $this->dataBase->load( 'portfolio', $id );
    if($portfolio->body != null)
    $portfolio->body = json_decode(gzuncompress(base64_decode($portfolio->body)));
    return $portfolio;
  }

  public function update_data($data, $id) {
    $portfolio = $this->dataBase->load( 'portfolio', $id );
    if($portfolio->title != $data->title) $portfolio->title = $data->title;
    if($portfolio->description != $data->description) $portfolio->description = $data->description;
    if($portfolio->color != $data->color) $portfolio->color = $data->color;
    if($portfolio->src_preview != $data->src_preview) $portfolio->src_preview = $data->src_preview;
    if($portfolio->seo_title != $data->seo_title) $portfolio->seo_title = $data->seo_title;
    if($portfolio->seo_description != $data->seo_description) $portfolio->seo_description = $data->seo_description;
    $body = base64_encode(gzcompress(json_encode($data->body), 9));
    if($portfolio->body != $body) $portfolio->body = $body;
    return $this->dataBase->store($portfolio);
  }

  public function delete_portfolio($id){
    $portfolio = $this->dataBase->load( 'portfolio', $id );
    return $this->dataBase->trash( $portfolio );
  }

  public function get_data_json_portfolio_id($id) {
    $portfolio = $this->dataBase->getRow('SELECT id, title, body, seo_title, seo_description FROM portfolio WHERE id = ?', [$id]);
    if($portfolio['body'] != null)
      $portfolio['body'] = json_decode(gzuncompress(base64_decode($portfolio['body'])));
    return json_encode($portfolio, JSON_NUMERIC_CHECK);
  }

  public function upload_img(){

    $img_upload = new FileUploader(
      'img',
                  [
                    'maxsize' => 200000,
                    'maxheight' => 20000,
                  ],
      'uploads/portfolio',
      );
    return $img_upload->upload_img($_FILES['img_file']);
  }

}