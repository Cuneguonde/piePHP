<?php
namespace Controller;

class AppController extends \Core\Controller {
    public function __construct()
    {

    }

    public function index() {
        $this->render('index');  
    }
    public function indexAction() {
    }
}   