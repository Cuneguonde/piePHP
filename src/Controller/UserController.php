<?php

namespace Controller;

//use UserModel;

class UserController extends \Core\Controller
{

    public function __construct()
    {
        //echo 'TEST</br>';
    }

    public function register()
    {
        $this->render('register');
    }
    public function registerAction()
    {
        $register = new \UserModel($_POST['email'], $_POST['password']);
        $register->create();
        $user_info = $register->read();
        $_SESSION['id'] = $user_info['id'];
        $_SESSION['email'] = $user_info['email'];
        $this->render('login');
    }
}
