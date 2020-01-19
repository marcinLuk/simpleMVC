<?php 
/**
 * @return void 
 * 
 * steruje aplikacją 
 */
Class App {

    /**
     * @var array tablica ze składowymi adresu URL
     */
    private $route = [];

    /**
     * @var int  ilość elementów w tablicy $route
     */
    private $route_count = 0;

    /**
     * @var array  tablica z nazwami metod
     */
    private $methods = [];

    /**
     * @var string nazwa modułu
     */
    private $class_name;

    /**
     * @var object przechowuje instancje klasy kontrolera
     */
    private $page;

    /**
     * @return void 
     * 
     * przypisuje wartości do właściwości
     */
    public function __construct() {

        $this->route = explode('/', URL);
        $this->route_count = count($this->route);

        if  ($this->route_count >= 4) {
            $this->class_name = $this->route[2];
        }

        if ( $this->route_count >= 5  ) {
            $this->methods =  array_slice($this->route, 3);
        }
    
    }

    /**
     * @return void
     * 
     * inicjuje aplikacje, przekierowywuje na strone główną 
     */
    public function start() {

        $controller_name = ucfirst( $this->class_name );

        if ( file_exists( CONTROLLER_PATH.$controller_name.'.php' ) ) {

            include CONTROLLER_PATH.$controller_name.'.php';
            $this->page = new $controller_name;
            $this->page->get_header();

            if ( isset( $this->methods ) ){
                $this->load_methods();
            } 

            $this->page->get_footer();

        } else {

            $this->redirect('home/index/');

        }
 
    }

    /**
     * @return void
     */
    private function redirect($url) {

        header('Location: '.$url);
        die;

    }

    /**
     * @return void
     * 
     * sprawdza czy metoda istnieje i ją wczytuje  
     */
    private function load_methods() {

        foreach ($this->methods as $method) {

            if( method_exists ( $this->class_name, $method ) ) {

                $this->page->$method();
            
            }

        }

    }

}