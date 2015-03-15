<?php
require_once './lib/simplemvcwf/model_base.php';
require_once './utility/guid_utility.php';

// Encapsulates all post database table access.
//   This method of encapsulation uses the singleton
//   design pattern.
class PostModel extends ModelBase {
    private static $postModel = NULL;
    
    private function __construct() {
    }
    
    // The create function is necessary to ensure there
    //   is only one instance of postDbAccess being used
    //   at any one time (eg. singleton)
    static function create() {
        if (NULL == self::$postModel) {
           self::$postModel = new PostModel();
        }
        return self::$postModel;
    }
    
    // Retrieves an post row by its post_id    
    public function selectPostByPostId($postId) {
        $sql = "SELECT *"
                . "FROM posts "
                . "WHERE postId = '" . $postId. "' "
                . "LIMIT 1;";
        
        return parent::queryFirst($sql);
    }
    
    // Retrieves all posts
    public function selectPosts() {
        $sql = "SELECT *"
                . "FROM posts;";
        
        return parent::query($sql);
    }
    
    // Adds an post row into the post table and
    //   returns the post_id Guid
    public function selectComments( $postId ){
    	$sql= "SELECT *"
    		  ." FROM comments"
    		  ." WHERE postId = "
    		  ."'".$postId ."';";
    		  return parent::query($sql);
    }
    public function insertComment ( $postId, $author , $body  ){
    	$commentId = GuidUtility::newGuid();
    	$sql = "INSERT INTO comments "
                . "("
                . "commentId, "
                . "commentAuthor, "
                . "commentBody, "
                . "postId "
                . ") VALUES ("
                . "'" . $commentId . "', "
                . "'" . $author . "', "
                . "'" . $body . "', "
                . "'" . $postId . "' "
                . ");";
        
        parent::execute($sql);
        
       
    } 
    
    public function insertPost($author, $title, $body, $createdOn) {
        $postId = GuidUtility::newGuid();
        $sql = "INSERT INTO posts "
                . "("
                . "postId, "
                . "postAuthor, "
                . "postTitle, "
                . "postBody, "
                . "created_on "
                . ") VALUES ("
                . "'" . $postId . "', "
                . "'" . $author . "', "
                . "'" . $title . "', "
                . "'" . $body . "', "
                . "'" . $createdOn . "' "
                . ");";
        
        parent::execute($sql);
        
        return $postId;
    }
}
?>