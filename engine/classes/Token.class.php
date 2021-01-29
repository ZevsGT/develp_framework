<?php

namespace engine\classes;
use engine\classes\Cryptography;

class Token extends Cryptography{
  private $hash_algo;
  private $type;
  private $data;

  public function __construct($key, $hash_algo, $type){
    $this->hash_algo = $hash_algo;
    $this->type = $type;
    parent::__construct($key, $hash_algo);
  }

  public function create_token($data, $time = false){
    $header = [
      'hash_algo' => $this->hash_algo,
      'type' => $this->type
    ];
    if(is_array($data)) {
      $payload = $data;
      if($time) $payload['iat'] = time() + $time;
    } else return 'error data is not array';
    $header = base64_encode(json_encode($header));
    $payload = base64_encode(json_encode($payload, JSON_NUMERIC_CHECK));
    $signature = $this->encrypt($header . $payload);
    return $header . '.' . $payload . '.' . $signature;
  }

  public function verifi_token($token){
    $token = explode('.', $token);
    $header = $token[0];
    $payload = $token[1];
    $signature = $token[2];
    if($this->decrypt($signature) == $header . $payload) {
      $this->data = json_decode(base64_decode($token[1]));
      return true;
    }
    else return false;
  }

  public function lifetime_token($token){
    $token = explode('.', $token);
    $payload = json_decode(base64_decode($token[1]));
    $this->data = $payload;
    if($payload->iat >= time()) return true;
    else return false;
  }

  public function setData($token){
    $token = explode('.', $token);
    $payload = json_decode(base64_decode($token[1]));
    $this->data = $payload;
  }

  public function getData(){
    return $this->data;
  }
}