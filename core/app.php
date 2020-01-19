<?php 
/**
 * @return void 
 * 
 * application engine
 */
Class App {

    /**
     * @var array array witch URL components 
     */
    private $route = [];

    /**
     * @var int amount of elements in array $route
     */
    private $route_count = 0;

    /**
     * @var array array with methods names
     */
    private $methods = [];

    /**
     * @var string name of module
     */
    private $class_name;

    /**
     * @var string name of controller
     */
    private $controller_name;

    /**
     * @var object contain new instance of Controller Class
     */
    private $page;

    /**
     * @return void 
     * 
     * assigns values to propeties,
     * if URL dosen't contain any class and method i'ts redirects to /home/index/
     */
    public function __construct() {

        $this->route = explode('/', URL);
        $this->route = array_slice($this->route, 2);
        $remove = array_pop($this->route); 
        $this->route_count = count($this->route);

        if ( empty ( $this->route_count ) )  {
            $this->redirect('home/index/');
        }

        if  ($this->route_count >= 1) {
            $this->class_name = $this->route[0];
            $this->controller_name = ucfirst( $this->class_name );
        }

        if ( $this->route_count >= 2  ) {
            $this->methods =  array_slice($this->route, 1);
        }

    
    }

    /**
     * @return void
     * 
     * starts application
     * if URL dosen't contain method it's loading index method
     */
    public function start() {

        include CONTROLLER_PATH.$this->controller_name.'.php';
        $this->page = new $this->controller_name;
        $this->page->get_header();

        if ( count( $this->methods ) != 0 ) {

            try {

                $this->load_methods();

            } catch (Exeption $e) {

                echo $e->getMessage();

            }

        } else {

            $this->redirect('index/');
        }

        $this->page->get_footer();
    }

    /**
     * @param string $url
     * @return void
     * 
     * redirect to given URL
     */
    private function redirect($url) {

        header('Location: '.$url);
        die;

    }

    /**
     * @return void
     * 
     * checking if given method exist and trays to load it's
     */
    private function load_methods() {

        foreach ($this->methods as $method) {


            if( method_exists ( $this->class_name, $method ) ) {

                $this->page->$method();
            
            } else {

                throw new Exception ('Method "'.$method.'" does not exist ');

            }

        }

    }


}