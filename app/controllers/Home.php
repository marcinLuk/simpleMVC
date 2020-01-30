<?php
namespace App\controllers;
/**
 * This is main page controller 
 * Class must contain index method, app will try automatically load index method at first;
 * Routing is based on class and methods:
 * example - http://example.com/SimpleMVC/className/index/method1/method2/
 */
class Home extends \Core\Controller {
    /**
     * @return void
     * 
     */
    public function index() {

        $this->get_view('index');

    }
    
}