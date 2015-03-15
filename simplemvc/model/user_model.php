<?php
require_once './lib/simplemvcwf/model_base.php';
require_once './utility/guid_utility.php';


// Encapsulates all Article database table access.
//   This method of encapsulation uses the singleton
//   design pattern.
class UserModel extends ModelBase {
    private static $userModel = NULL;
    
    private function __construct() {
    }
    
    // The create function is necessary to ensure there
    //   is only one instance of ArticleDbAccess being used
    //   at any one time (eg. singleton)
    static function create() {
        if (NULL == self::$userModel) {
           self::$userModel = new UserModel();
        }
        return self::$userModel;
    }
    
    // Retrieves an article row by its article_id    
    public function selectUserByUserName($userName) {
        $sql = "SELECT *"
                . "FROM users "
                . "WHERE userName = '" . $userName. "' "
                . "LIMIT 1;";
        
        return parent::queryFirst($sql);
    }
 public function selectUserByUserId($userId) {
        $sql = "SELECT *"
                . "FROM users "
                . "WHERE userId = '" . $userId. "' "
                . "LIMIT 1;";
        
        return parent::queryFirst($sql);
    }
    function selectAllUserName ( ) {
		$sql = "SELECT *"
				." FROM users ; ";
		return parent::query( $sql);
				
	}
    // Retrieves all articles
    public function selectUsers() {
        $sql = "SELECT *"
                . "FROM users;";
        
        return parent::query($sql);
    }
    // select user name and password fore checking
	public function selectUserNameAndPassword() {
        $sql = "SELECT userName , password "
                . "FROM users;";
        
        return parent::query($sql);
    }
    
    // Adds an article row into the article table and
    //   returns the article_id Guid
    public function insertUser($name , $familyName , $userName, $password ) {
        $userId = GuidUtility::newGuid();
		$role = 0 ; // ordinary user
		$state =  1 ; // authorized for send comment
        $sql = "INSERT INTO users "
                . "("
                . "userId, "
                . "name, "
                . "familyName, "
                . "userName, "
                . "password, "
                . "role, "
				. "state "
                . ") VALUES ("
                . "'" . $userId . "', "
                . "'" . $name . "', "
                . "'" . $familyName . "', "
                . "'" . $userName. "', "
                . "'" . $password . "', "
                . "'" . $role . "',"
                . "'" . $state . "'"
                . ");";
        
        parent::execute($sql);
        
        return $userId;
    }
	public function updateUserState ( $userName,  $name  , $familyName , $state ) {
		$sql = "UPDATE users "
				."SET "
				."name = "
				."'".$name."',"
				."familyName = "
				."'".$familyName."',"
				."state = "
				."'".$state. "' "
				."WHERE userName = "
				."'".$userName."'"
				.";";
		parent::execute($sql);
		
	}
	public function updateUser ( $userName,  $name  , $familyName , $password ) {
		$sql = "UPDATE users "
				."SET "
				."name = "
				."'".$name."',"
				."familyName = "
				."'".$familyName."',"
				."password = "
				."'".$password. "' "
				."WHERE userName = "
				."'".$userName."'"
				.";";
		parent::execute($sql);
		
	}
}
?>