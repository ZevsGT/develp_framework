<?php

namespace engine\controllers;

use engine\classes\Controller;

class AdminController extends Controller{
		
	public function indexAction(){
		$site_path = $this->config['http_home_url'].'/templates/admin';
		
		$template = $this->twig->loadTemplate('admin/main.tpl');
        return $template->render(array(
																	'content' => $content, 
																	'site_path' => $site_path, 
																	's_tittle' => $this->config['home_title'],
                                                                    'http_url' =>$this->config['http_home_url']
																));
	}
    public function exitAction(){
        unset($_SESSION['user']);
        header('Location: /admin/login');
        exit;
    }

	public function loginAction(){

        $data = null;
        if(isset($_POST['submit'])){
            $user = $this->dataBase->findOne('users', 'email = ?',[$_POST['email']]);
            if($user){
                if (password_verify($_POST['password'], $user->password)){
                    $_SESSION['user']['id_group'] = $user->group_id;
                    header('Location: /admin');
                }else {
                    $data['email'] =  $_POST['email'];
                    $data['error'] = 'Неверный логин или пароль!';
                }
            }else {
                $data['email'] =  $_POST['email'];
                $data['error'] = 'Неверный логин или пароль!';
            }
        }

		$site_path = $this->config['http_home_url'].'/templates/admin';
		$template = $this->twig->loadTemplate('admin/login_page.tpl');
        return $template->render(array(
																	'site_path' => $site_path, 
																	's_tittle' => 'Авторизация',
                                                                    'data' => $data
																));
	}

    public function product_addAction(){
        $site_path = $this->config['http_home_url'].'/templates/admin';
        $content = $this->load_module(product, add);

        if(isset($_POST[delproduct])) exit($content);

        $template = $this->twig->loadTemplate('admin/main.tpl');
        return $template->render(array(
            'content' => $content,
            'site_path' => $site_path,
            's_tittle' => $this->config['home_title']
        ));
    }

    public function product_allAction(){
        $site_path = $this->config['http_home_url'].'/templates/admin';
        $content = $this->load_module(product, all);

        if(isset($_POST[delproduct])) exit($content);

        $template = $this->twig->loadTemplate('admin/main.tpl');
        return $template->render(array(
            'content' => $content,
            'site_path' => $site_path,
            's_tittle' => $this->config['home_title']
        ));
    }

    public function product_editAction(){
        $site_path = $this->config['http_home_url'].'/templates/admin';
        $content = $this->load_module(product, edit);

        if(isset($_POST[delproduct])) exit($content);

        $template = $this->twig->loadTemplate('admin/main.tpl');
        return $template->render(array(
            'content' => $content,
            'site_path' => $site_path,
            's_tittle' => $this->config['home_title']
        ));
    }

    public function orders_allAction(){
        $site_path = $this->config['http_home_url'].'/templates/admin';
        $content = $this->load_module(orders, all);


        $template = $this->twig->loadTemplate('admin/main.tpl');
        return $template->render(array(
            'content' => $content,
            'site_path' => $site_path,
            's_tittle' => $this->config['home_title']
        ));
    }

    public function orders_infoAction(){
        $site_path = $this->config['http_home_url'].'/templates/admin';
        $content = $this->load_module(orders, info);

        if(isset($_POST[delproduct])) exit($content);

        $template = $this->twig->loadTemplate('admin/main.tpl');
        return $template->render(array(
            'content' => $content,
            'site_path' => $site_path,
            's_tittle' => $this->config['home_title']
        ));
    }

}