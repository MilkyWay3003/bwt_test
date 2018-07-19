<?

abstract class Controller {

    public $model;
    public $view;

    /**
     * @param string $controller_path_folder
     */
    function __construct($controller_path_folder = "")
    {
        $this->view = new View($controller_path_folder);
    }

}