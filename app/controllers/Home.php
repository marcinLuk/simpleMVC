<?php

include 'core/classes/Controller.php';

/**
 * Main page Controller
 * Class must contain index method
 * Routing is based on class and methods:
 * example - http://example.com/SimpleMVC/className/method1/method2/
 */
class Home extends Controller {

    /**
     * @return void
     * 
     * looking for view 'index' and displays it
     */
    public function index() {
        $this->view('index');
    }
    
}