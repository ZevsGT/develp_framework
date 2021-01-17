<?php

namespace engine\classes;

class ACL {

	private $params;
	private $ACL;

	public function __construct($params){
	    $this->params = $params;
        if (file_exists($_SERVER['DOCUMENT_ROOT'].'/engine/data/ACL.xml')) {
            $this->ACL = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/engine/data/ACL.xml");
        } else {
            exit('error: Файл ACL не найден!');
        }
	}

	public function start(){
		if($this->search()) return true;//если найдено
		else return false;//если не найдено
	}

	private function test(){
	  echo 'zaraza';
	  return true;
  }

	private function search(){

        foreach ($this->ACL as $group){
            if($group['id'] == 'none' || $group['id'] == $_SESSION['user']['id_group']){
                foreach ($group as $controller){
                    if($controller['name'] == $this->params['controller']){
                        foreach ($controller as $action){
                            if($action == $this->params['action']) return true;
                        }
                    }
                }
            }
        }

		return false;
	}

}