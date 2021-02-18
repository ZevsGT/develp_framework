<?php

namespace engine\classes;

class FileUploader {

  private $upload_dir;
  private $properties;
  private $rename_f;

  public function __construct($file_type, $properties, $upload_dir = 'uploads', $rename_f = true) {
    $this->upload_dir = trim($upload_dir, '/');
    $this->rename_f = $rename_f;
    if($file_type === 'img') {
      $this->properties['maxsize'] = isset($properties['maxsize']) ? $properties['maxsize'] : 2000;
      $this->properties['maxwidth'] = isset($properties['maxwidth']) ? $properties['maxwidth'] : 2000;
      $this->properties['maxheight'] = isset($properties['maxheight']) ? $properties['maxheight'] : 2000;
      $this->properties['type'] = isset($properties['type']) ? $properties['type'] : ['bmp', 'gif', 'jpg', 'jpeg', 'png'];
    }
  }

  public function upload_img($img) {
    if(isset($img) && strlen($img['name']) > 1) {
      define('F_NAME', preg_replace('/\.(.+?)$/i', '', basename($img['name'])));
      // Get filename without extension
      $sepext = explode('.', strtolower($img['name']));
      $type = end($sepext);    /** gets extension **/

      $error = '';
      // Validate file type

      if(in_array($type, $this->properties['type'])){
        // Image width and height
        list($width, $height) = getimagesize($img['tmp_name']);

        if(isset($width) && isset($height)) {
          if($width > $this->properties['maxwidth'] || $height > $this->properties['maxheight']){
            $error .= 'Ширина x Высота = '. $width .' x '. $height .' Максимальная ширина x высота должна быть: '. $this->properties['maxwidth']. ' x '. $this->properties['maxheight'];
          }

          if($img['size'] > $this->properties['maxsize']*1000){
            $error .= 'Превышен размер файла. максимальный размер: '. $this->properties['maxsize']. ' KB.';
          }
        }
      }else{
        $error .= 'Файл: '. $img['name'] . ' не имеет разрешенного типа расширения.';
      }

      // If no errors, upload the image, else, output the errors
      if($error == ''){

        $f_name = md5(uniqid(F_NAME)).".$type";
        $uploadpath = $_SERVER['DOCUMENT_ROOT'] .'/'.$this->upload_dir .'/'. $f_name;

        if(move_uploaded_file($img['tmp_name'], $uploadpath)) {
          $answer['state'] = 'ready';
          $answer['f_name'] = $f_name;
          $answer['src_img'] = $this->upload_dir .'/'. $f_name;
          return $answer;
        }else{
          $error = 'Попытка загрузить файл прошла неудачно!';
        }
      }
      $answer['error'] = $error;
      return $answer;
    } else return $answer['error'] = 'Файл не найден!';
  }

}