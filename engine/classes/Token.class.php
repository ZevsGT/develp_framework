<?php

namespace engine\classes;
use engine\classes\Cryptography;

class Token extends Cryptography{
  public function __construct($key)
  {
    parent::__construct($key);
  }
}