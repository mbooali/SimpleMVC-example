<?php
require_once './lib/simplemvcwf/route.php';
require_once './lib/simplemvcwf/router.php';
require_once './lib/simplemvcwf/view_data.php';


// The ViewHelper encloses any helper methods used to render or manipulate the view.
//   This is mostly empty for now, but there are a number of functions useful to working
//   with a view that could go in here.
class ViewHelper {   
    function __construct($router) {
    }
    
    // Creates a hyperlink url based on a controller and action
    static function createLinkUrl($controller, $action) {
        global $baseUrl;
        
        echo $baseUrl . '/' . $controller . '/' . $action;        
    }
    
    // Creates a hyperlink url based on a static file url
    static function createStaticUrl($url) {
        global $baseUrl;
        
        echo $baseUrl . '/static/' . $url;
    }
    static function userValidation(){
    	session_start();
    	return ( isset($_SESSION['userName'])? "logout":"login"  );
    }
    static function  wellcomMessage (){
    	session_start();
    	if (!isset($_SESSION['name']))
    		return;
    	return  "Welcome ".$_SESSION['name']." !";
    }
        // this funcition check that user is admin or not
    static function isAdmin (){
    	session_start();
    	return ( isset($_SESSION['userName'] ) && $_SESSION['role'] == '1' );
    }
static function isAdmin1 (){
    	session_start();
    	if ( ! (isset($_SESSION['userName'] ) && $_SESSION['role'] == '1' ) )
    		header('Location: ../home/index');
    }
    static function isUser(){
    	session_start();
    	if  (!isset($_SESSION['userName']))
    		header('Location: ../user/login');
    }
static function isUser1(){
	    	session_start();
    	if  (!isset($_SESSION['userName']))
    		header('Location: ../user/login');
    }
    static function notState($str){
    	return ($str== 'FREE')? 'BLOCKED':'FREE';
    }
    static function allowSendComment (){
    	
    	return ( isset($_SESSION['userName']) );
    	
    }
}
?>