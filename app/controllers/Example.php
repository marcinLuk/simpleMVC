<?php
namespace App\controllers;
/**
 * Template for Controllers
 * it must contain index method
 * Routing is based on class and methods:
 * example - http://example.com/SimpleMVC/className/index/method1/method2/
 */
class Example extends \Core\Controller {

    /**
     * @return void
     * 
     * this will be the first method that will be automatically loaded
     */
    public function index() {

        $this->get_view('title');
        $this->get_view('button');

    }

    public function exampleMethod() {

        $additional_data = [
            'title'=>'Success',
            'title2'=>'Everything Works!',
        ];
        /**
         * get_view() will store all additional data in $display array 
         */
        $this->get_view( 'anotherView', $additional_data );

    }
    
}