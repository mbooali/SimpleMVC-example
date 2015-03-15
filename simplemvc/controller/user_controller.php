<?php
require_once './lib/simplemvcwf/view_data.php';
require_once './lib/simplemvcwf/controller_base.php';
require_once './model/user_model.php';
require_once './utility/date_time_utility.php';
require_once './utility/view_helper.php';



class UserController Extends ControllerBase {
    function index() {
        // Render the action with template
        //$this->renderWithTemplate('about/index', 'subpage_base_template');
       
        	$this->render('user/index');
       // else 
        	//header('Location: ../user/login');
        	
		
    }
 
    // this function logout the user
    function logout () {
    	session_start();
    	if ( isset( $_SESSION['userName']) )
    		session_destroy();
    	$this->viewData['message'] = "you successfully logout";
    	$this->render('user/logout');
    } 
    // this profile load edit Profile Page
    function editProfile(){
    	session_start();
    	$this->viewData['user'] = UserModel::create()->selectUserByUserName($_SESSION['userName']) ;
    	$this->render('user/editProfile');
    }
    
    function submitEditProfile ( ){
    	session_start();
    	UserModel::create()->updateUser ( $_SESSION['userName'] , $_POST['name'] , $_POST['familyName'] , $_POST['password'] );
    	$this->render('user/submitEditProfile');
    }
    
	function succesfullRegistration (){
		$this->render ( 'user/succesfullRegistration' );
	}
	function login (){
		$this->render ( 'user/login' );
	}
	
	function register(){
		$this -> render ( 'user/register' ) ;
	}
	function checkUserName ( $userName ) {
		
		$this->viewData['userNames'] = UserModel::create()->selectAllUserName();
		$arr = UserModel::create()->selectAllUserName();
		foreach ( $arr as $userNameDB ) {
			
			if ( $userNameDB->userName == $userName )
				return false;
		}
		return true;
	}
	function submitRegister() {
			
			if ( $this ->checkUserName ($_POST['userName']) ){
				UserModel::create()->insertUser ( $_POST['name'] , $_POST['familyName'] , $_POST['userName'] , $_POST['password'] );
				echo '<head><meta HTTP-EQUIV="REFRESH" content="2; url=./"></head>';
				echo '<br> your registration complete succesfully' ;
			}
			else{
				echo '<head><meta HTTP-EQUIV="REFRESH" content="2; url=./register"></head>';
				echo '<br> this userName already exist try again';
			}
			// inja bayad redirect beshim be ye pagi ke ino namayesh bede 
			//....
			
			
	}
	// this function check usr is vali or not
	function submitLogin(){
		if ($this->checkUser($_POST['userName'] , $_POST['password'])){
			$this->viewData['message'] = "Succesfully login";
			session_start();
			if (!isset($_SESSION['userName'])){
				$arr = UserModel::create()->selectUserByUserName($_POST['userName']) ;
				$_SESSION['userName'] = $_POST['userName'];
				$_SESSION['name'] = $arr->name;
				$_SESSION['role'] = $arr->role;
				$_SESSION['state'] = $arr->state;
			}
			
		}
		else{
			$this->viewData['message'] = "Login Falied , becase Your User Name or Password is Wrong! , Please try Again";
		}
		$this->render('user/submitLogin');	
		
		
	}
	function checkUserValidation( $userName ){
		if ( is_null($userName))
			return false;
		$arr = UserModel::create()->selectUserByUserName($userName) ;
		if ( $arr->userName == $userName)
		return  ( $arr->userName == $userName );
	}
	function registerSubmit(){
		
	}
	function checkUser($userName , $password){
		$arr = UserModel::create()->selectUsers();
		foreach ($arr as $value) {
			if ( $value->userName == $userName && $value->password == $password ) 
			return  true;
		}
		return false;
	}
	
	
}
?>