<?php
/**
 * It contain methods and properties fof Controller Class
 */
abstract class Controller {
    /**
     * @var object contain object for Model class
     */
    private $model;

    /**
     * @var string contain current class name 
     */
    private $class_name;

    /**
     * create new instance of Model class, assign class name to $class_name property 
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
     * include view template
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