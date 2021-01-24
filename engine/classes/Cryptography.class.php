<?php

namespace engine\classes;

class Cryptography {
  private $key;
  private $hash_algo;

  function __construct($key, $hash_algo = 'sha256'){
    $this->hash_algo = $hash_algo;
    $this->key = $key;
  }

  public function encrypt($string){
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($string, $cipher, $this->key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac($this->hash_algo, $ciphertext_raw, $this->key, $as_binary=true);
    return base64_encode( $iv.$hmac.$ciphertext_raw );
  }

  public function decrypt($string){
    $c = base64_decode($string);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $this->key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac($this->hash_algo, $ciphertext_raw, $this->key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)){
      return $original_plaintext;
    } else return false;
  }
}