<?php
/**
 * przechpwuje metody klasy Controller
 */
abstract class Controller {
    /**
     * @var object przechowuje obiekt klasy Model
     */
    private $model;

    /**
     * @var string przechowuje nazwe obecnej klasy 
     */
    private $class_name;

    /**
     * tworzy instancje klasy Model, przechowje nazwe klasy 
     */
    public function __construct() {

        $route = explode('/', URL);
        include MODELS_PATH.$route[2].'Model.php';
        $model_name = ucfirst ($route[2]).'Model' ;

        $this->model = new $model_name; 

        $this->class_name = get_class();

    }

    /**
     * @param string $template_name 
     * @return void
     * 
     * ładuje templatke html
     */
    public function view( $template_name ) {

        $class = lcfirst( get_class($this ) );

        include VIEWS_PATH.$class.'/'.$template_name.'.html.php';

    }

    /**
     * @return void
     */
    public function get_header() {

        include VIEWS_PATH.'templates/header.html.php';

    }

    /**
     * @return void
     */
    public function get_footer() {

        include VIEWS_PATH.'templates/footer.html.php';

    }

}