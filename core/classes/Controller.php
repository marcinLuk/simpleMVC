<?php
namespace Core;
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
     * @var string page title
     */
    public $title;
    /**
     * create new instance of Model class, assign class name to $class_name property 
     */
    public function __construct() {

        $route = explode('/', URL);
        $model_name = '\\App\\models\\'.$route[2].'Model';

        $this->model = new $model_name; 

        $this->class_name = $route[2];

        $this->title = $this->class_name;

    }

    /**
     * @param string $url
     * @return void
     * 
     * redirect to given URL
     */
    public function redirect($url) {

        header('Location: '.$url);
        die;

    }

     /**
     * @param string $view_name
     * @param array $display additional elements that will be display on page     
     * @return void
     * 
     * displays view
     */
    public function get_view( $view_name, $display = [] ) {

        include VIEWS_PATH.'/'.$this->class_name.'/'.$view_name.'.html.php';

    }

    /**
     * @param string $title
     * @return void
     */
    public function get_header( ) {

        $title = $this->title;
        include VIEWS_PATH.'templates/header.html.php';

    }

    /**
     * @return void
     */
    public function get_footer() {

        include VIEWS_PATH.'templates/footer.html.php';

    }

}