<?php

require_once './lib/simplemvcwf/view_data.php';
require_once './lib/simplemvcwf/controller_base.php';
require_once './model/user_model.php';
require_once './utility/date_time_utility.php';
require_once './utility/view_helper.php';

class AdminController Extends ControllerBase {
    function index() {
        // Render the action with template
        //$this->renderWithTemplate('about/index', 'subpage_base_template');
        $this->render('user/index');
    }
	function submitEdit(){
    	session_start();
    	echo  $_POST['hidden'];
    	UserModel::create()->updateUserState ( $_POST['hidden']  , $_POST['name'],$_POST['familyName'] , $_POST['state']);
    	$this->render('admin/submitEdit');
    	
    } 
    function editUserState (){
    	$this->viewData['users'] =  UserModel::create()->selectAllUserName();
    	$this->render('admin/editUserState');
    }
     
    function editUser (){
    	$this->viewData['user'] = UserModel::create()->selectUserByUserId($_GET['userId']) ;
    	$this->render('admin/editUser');
    	
    }
    
}
?>