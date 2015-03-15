<?php
require_once './lib/simplemvcwf/view_data.php';
require_once './lib/simplemvcwf/controller_base.php';

class HomeController Extends ControllerBase {
    function index() {
        // Render the action with template
        $this->render('home/index');
    }    
}
?>