<?php

namespace engine\classes;

use engine\classes\Token;
use engine\modules\UsersModule;

class ACL {

	private $params;
	private $ACL;
	private $config;
	private $response;
	private $group_id;
	private $dataBase;

	public function __construct($params, $config, $dataBase){
	    $this->params = $params;
	    $this->config = $config;
      $this->dataBase = $dataBase;
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

	private function search(){
    foreach ($this->ACL as $group){
        if($group['id'] == 'none' || $group['id'] == $this->user_id_group()){
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

	private function user_id_group(){
	  if($this->group_id) return $this->group_id;
	  else if( isset(getallheaders()['X-Access-Token']) && $this->validateToken(getallheaders()['X-Access-Token']) ){
      return $this->group_id;
    } else if( isset(getallheaders()['X-Refresh-Token']) && $this->getNewToken(getallheaders()['X-Refresh-Token']) ) {
      return $this->group_id;
    } else return null;
  }

  private function validateToken($AToken) {
    $token = new Token($this->config['key'], 'sha256', 'JWT');
    if($token->verifi_token($AToken)){
      if($token->lifetime_token($AToken)) {
        $this->group_id = $token->getData()->group_id;
        $this->response['status'] = 'ready';
        $this->response['message'] = '';
        return true;
      } else {
        $this->response['status'] = 'error';
        $this->response['message'] = 'TIM_L';//время жизни истекло
        return false;
      }
    } else {
      $this->response['status'] = 'error';
      $this->response['message'] = 'T_N_V';//не прошел валидацию
      return false;
    }
  }

  private function getNewToken($RToken) {
    $token = new Token($this->config['key'], 'sha256', 'JWT');

    if($token->verifi_token($RToken)){
      $user = new UsersModule($this->dataBase);
      $user->load_user($token->getData()->id);
      if($RToken == $user->getUser()->rtoken){
        $this->response['token'] = $token->create_token([
          'id' =>  $user->getUser()->id,
          'name' => $user->getUser()->name,
          'src_photo' => $user->getUser()->src_photo,
          'group_id' => $user->getUser()->group_id
        ], 900);
        $this->response['refresh_token'] = $token->create_token([
          'id' =>  $user->getUser()->id,
          'name' => $user->getUser()->name,
          'src_photo' => $user->getUser()->src_photo,
          'group_id' => $user->getUser()->group_id
        ]);
        $this->group_id = $user->getUser()->group_id;
        $user->store_user_token($this->response['refresh_token']);
        unset($this->dataBase, $user, $token);
        $this->response['status'] = 'ready';
        $this->response['message'] = 'token_is_true';
        return true;
      } else {
        $this->response['status'] = 'error';
        $this->response['message'] = 'T_DT_N_T';
        return false;//не верный токен
      }
    } else {
      $this->response['status'] = 'error';
      $this->response['message'] = 'T_DT_N_V';
      return false;//не прошли валидацию
    }
  }

  public function getResponse() {
	  return $this->response;
  }

}