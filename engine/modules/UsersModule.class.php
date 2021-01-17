<?php
namespace engine\modules;

use engine\classes\Module;

class UsersModule extends Module {
  public function get_json_workers() {
    $workers = $this->dataBase->getAll( '
        SELECT users.id, CONCAT(users.name, \' \', users.surname) AS name, user_role.name AS role, users.link_vk, users.status, users.src_photo, users.bg_src_img FROM `users` 
        INNER JOIN  user_role ON user_role.id = users.role_id
        WHERE `worker`= 1'
     );
    return json_encode($workers, JSON_NUMERIC_CHECK);
  }
}