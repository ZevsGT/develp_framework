<?php
namespace engine\modules;

use engine\classes\Module;

class UsersModule extends Module {

  private $user;

  public function get_json_workers() {
    $workers = $this->dataBase->getAll( '
        SELECT users.id, CONCAT(users.name, \' \', users.surname) AS name, user_role.name AS role, users.link_vk, users.status, users.src_photo, users.bg_src_img FROM `users` 
        INNER JOIN  user_role ON user_role.id = users.role_id
        WHERE `worker`= 1'
     );
    return json_encode($workers, JSON_NUMERIC_CHECK);
  }

  public function load_user_data($email) {
    $this->user = $this->dataBase->findOne( 'users', ' email = ? ', [ $email ]);
  }

  public function create_new_user($name, $surname, $email, $password) {
    $new_user = $this->dataBase->dispense( 'users' );
    $new_user->name = $name;
    $new_user->surname = $surname;
    $new_user->email = $email;
    $new_user->password = password_hash($password, PASSWORD_DEFAULT);
    $user_group = $this->dataBase->findOne( 'user_group', ' name = ? ', [ 'Заказчик' ]);
    $new_user->group = $user_group;
    $new_user->src_photo = '/img/no_user_photo.jpg';
    $new_user->status = 0;
    $new_user->worker = 0;
    return $this->dataBase->store($new_user);
  }

  public function load_user($id) {
    $this->user = $this->dataBase->load('users', $id);
  }

  public function getUser(){
    return $this->user;
  }

  public function store_user_token($token) {
    $this->user->rtoken = $token;
    return $this->dataBase->store($this->user);
  }
}