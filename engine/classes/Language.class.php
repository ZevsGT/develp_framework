<?php

namespace engine\classes;

class Language {
    private $config;
    private $language;
    private $language_pack = [];

    public function __construct(){
        $this->config = include $_SERVER['DOCUMENT_ROOT'].'/engine/data/config.php';

        if($this->config['default_language'] == null){
            $temp = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            $this->language = $temp[0];
            unset($temp);
        }elseif(isset($_SESSION['selected_language'])) {
            $this->language = $_SESSION['selected_language'];
        }else {
            $this->language = $this->config['default_language'];
        }
    }

    public function set_language_pack($pack){
        foreach ($pack as $dir_file){
            if(file_exists($_SERVER['DOCUMENT_ROOT'].'/engine/language/'.$this->language.'/'.$dir_file)){
                $lang_file = include $_SERVER['DOCUMENT_ROOT'].'/engine/language/'.$this->language.'/'.$dir_file;
                $this->language_pack = array_merge($this->language_pack, $lang_file);
            }
        }
    }

    public function get_language_pack(){
        return $this->language_pack;
    }
}