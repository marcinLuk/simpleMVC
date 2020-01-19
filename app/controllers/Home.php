<?php

include 'core/classes/Controller.php';

/**
 * kontroler strony głównej 
 * klasa Home musi posiadać metodę index za pomoca której wyświetlana jest strona główna
 * Routing bazuje na klasie oraz odpowiednich metodach
 * np. http://example.com/SimpleMVC/nazwaKlasy/nazwaMetody1/nazwaMetody2/
 */
class Home extends Controller {

    /**
     * @return void
     * 
     * wyświetla strone główną 
     */
    public function index() {
        $this->view('index');
    }
    
}