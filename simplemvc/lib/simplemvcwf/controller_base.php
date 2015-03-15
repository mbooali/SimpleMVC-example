<?php
require_once './model/dbconfig.php';

// ControllerBase contains all of the base functions necessary for
//   each controller class to process page logic as easily as
//   possible
abstract class ControllerBase {
    protected $viewData;    
    
    function __construct() {
        $this->viewData = new ViewData();
    }
    
    // Renders a view
    protected function render($view) {
        // Render the view in the view/controller/action folder
        $viewPath = './' . 'view' . DIRECTORY_SEPARATOR . $view . '.php';

        // Check to make sure the view file we're attempting to render exists
        if (file_exists($viewPath) == false) {
                trigger_error ('View `' . $view . '` does not exist.', E_USER_NOTICE);
                return false;
        }        
        
        // Transform the viewData structure into variables for use on the rendered
        //   view page
        foreach ($this->viewData as $key => $value) {
                $$key = $value;
        }
        
        // And finally, include the actual view page
        include_once ($viewPath);
    }
}
?>