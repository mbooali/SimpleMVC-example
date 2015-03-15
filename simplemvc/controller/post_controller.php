<?php
require_once './lib/simplemvcwf/view_data.php';
require_once './lib/simplemvcwf/controller_base.php';
require_once './model/post_model.php';
require_once './utility/date_time_utility.php';

class PostController Extends ControllerBase {
    function index() {
        // Get all posts and store them in the 'posts' view data structure
        $this->viewData['posts'] = PostModel::create()->selectPosts();
        
        // Render the action with template
        $this->render('post/index');
    }
    function postComment(){
    	session_start();
    	
    	PostModel::insertComment( $_POST['postId'] , $_SESSION['userName'] , $_POST['body']);
    	$this->render('post/postComment');
    }
    function postWithComments() {
        // Get all posts and store them in the 'posts' view data structure
        
        $this->viewData['post'] = PostModel::create()->selectPostByPostId($_GET['postId']);
        $this->viewData['comments'] = PostModel::create()->selectComments( $_GET['postId'] );
        // Render the action with template
        $this->render('post/postWithComments');
    }
    
    function addPost() {
        // Render the action with template
        $this->render('post/addPost');
    }
    
    function addsubmit() {
        // Get the current precise time, including milliseconds
        list($s, $ms) = DateTimeUtility::getPreciseTime();
        // Use the add action's post form variables and the current precise time to insert an post.
        //   We should validate all post variables before inserting them to avoid a
        //   SQL Injection attack and ensure that we've working with clean data. For
        //   the purposes of this demo, we're just going to use the post variables
        //   directly.
        PostModel::create()->insertPost($_POST['author'], $_POST['title'], $_POST['body'], date("Y-m-d H:i:s", $s));

        // Normally we might render the addsubmit action and indicate success or failure.
        //   For now, we're just going to redirect to the home/index action.
        header('Location: ../user/index');
        
        // See previous comment.
        //$this->renderWithTemplate('post/addsubmit', 'subpage_base_template');
    }
}
?>