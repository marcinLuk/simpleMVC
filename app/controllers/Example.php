<?php

include 'core/classes/Controller.php';

/**
 * Przykładowa strona 
 * Routing bazuje na klasie oraz odpowiednich metodach
 * np. http://example.com/SimpleMVC/nazwaKlasy/nazwaMetody1/nazwaMetody2/
 */
class Example extends Controller {

    public function test() {

        $this->view('test');

    }

}