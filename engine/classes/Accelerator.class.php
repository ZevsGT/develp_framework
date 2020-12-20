<?php

namespace engine\classes;

class Accelerator {

    private $cache_path;
    private $cache_contents;

    public function __construct($cache_path){
        $this->cache_path = $_SERVER['DOCUMENT_ROOT'].'/'.$cache_path.'/'.md5($_SERVER['REQUEST_URI']).'.php';
    }

    public function check_cache_exist($cache_on, $cache_time = 0){
        if($cache_on == 'true'){
            if(file_exists($this->cache_path ) && ($cache_time == 0 || time() - $cache_time < filemtime($this->cache_path)) ){
                $this->cache_contents = file_get_contents($this->cache_path);
                return 'CACHE_EXIST';

            }else return 'CACHE_NOT_EXIST';

        }else return 'CACHE_DISABLED';
    }

    public function get_cache_contents(){
        return $this->cache_contents;
    }

    public function write_cache($contents){
        file_put_contents($this->cache_path, $contents);
    }

}