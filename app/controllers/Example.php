<?php

include 'core/classes/Controller.php';
/**
 * Example Page
 * Controller Classes must contain index method
 * Routing is based on class and methods:
 * example - http://example.com/SimpleMVC/className/method1/method2/
 */
class Example extends Controller {

    public function index() {

        $this->view('test');

    }

}