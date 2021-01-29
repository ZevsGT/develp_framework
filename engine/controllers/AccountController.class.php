<?php

/**
 * 
 */
namespace engine\controllers;

use engine\classes\Controller;
use engine\classes\Token;
use engine\modules\UsersModule;

class AccountController extends Controller{

  public function getStatusAction() {
    return json_encode($this->route['RESPONSE']);
  }
	
	public function signInAction(){
	  $user = new UsersModule($this->dataBase);
    $user->load_user_data($_POST->email);
	  if($user->getUser()) {
      if(password_verify($_POST->password, $user->getUser()->password)){
        $token = new Token($this->config['key'], 'sha256', 'JWT');
        $answer['token'] = $token->create_token([
          'id' => $user->getUser()->id,
          'name' => $user->getUser()->name . ' ' . $user->getUser()->surname,
          'src_photo' => $user->getUser()->src_photo,
          'group_id' => $user->getUser()->group_id
        ], 900);
        $answer['refresh_token'] = $token->create_token([
          'id' => $user->getUser()->id,
          'name' => $user->getUser()->name . ' ' . $user->getUser()->surname,
          'src_photo' => $user->getUser()->src_photo,
          'group_id' => $user->getUser()->group_id
        ]);
        $user->store_user_token($answer['refresh_token']);
        $answer['status'] = 'ready';
        return json_encode($answer);
      } else {
        $answer['status'] = 'error';
        $answer['message'] = 'W_L_P';//Неверный логин или пароль
        return json_encode($answer);
      }
    } else {
      $answer['status'] = 'error';
      $answer['message'] = 'U_NF';//Пользователь не найден
      return json_encode($answer);
    }
	}

	public function signUpAction(){
        return "страница регистрации";
	}

	public function validateTokenAction() {
    $token = new Token($this->config['key'], 'sha256', 'JWT');
    if($token->verifi_token($_POST->token)){
      if($token->lifetime_token($_POST->token)) {
        $answer['state'] = 'ready';
        return json_encode($answer);
      } else {
        $answer['error'] = 'TIM_L';//время жизни истекло
        return json_encode($answer);
      }
    } else {
      $answer['error'] = 'T_N_V';//не прошел валидацию
      return json_encode($answer);
    }
  }

  public function getNewTokenAction() {
    $token = new Token($this->config['key'], 'sha256', 'JWT');

    if($token->verifi_token($_POST->refresh_token)){
      $user = new UsersModule($this->dataBase);
      $user->load_user($token->getData()->id);
      if($_POST->refresh_token == $user->getUser()->rtoken){
        $answer['token'] = $token->create_token([
          'id' =>  $token->getData()->id,
          'name' => $token->getData()->name,
          'src_photo' => $token->getData()->src_photo,
          'group_id' => $token->getData()->group_id
        ], 900);
        $answer['refresh_token'] = $token->create_token([
          'id' =>  $token->getData()->id,
          'name' => $token->getData()->name,
          'src_photo' => $token->getData()->src_photo,
          'group_id' => $token->getData()->group_id
        ]);
        $user->store_user_token($answer['refresh_token']);
        $answer['state'] = 'ready';
        return json_encode($answer);
      } else {
        $answer['error'] = 'T_DT_N_T';
        $answer['t'] = $_POST->refresh_token;
        $answer['rt'] = $token->getData()->rtoken;
        return json_encode($answer);//не верный токен
      }
    } else {
      $answer['error'] = 'T_DT_N_V';
      return json_encode($answer);//не прошли валидацию
    }
  }
}