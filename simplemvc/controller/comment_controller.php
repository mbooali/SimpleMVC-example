<?php
require_once './lib/simplemvcwf/view_data.php';
require_once './lib/simplemvcwf/controller_base.php';

class CommentController Extends ControllerBase {
    function index() {
        // Render the action with template
        //$this->renderWithTemplate('about/index', 'subpage_base_template');
        $this->render('comments/index');
    }    
}
?>