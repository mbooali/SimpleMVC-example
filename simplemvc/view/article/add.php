<?php require_once './utility/view_helper.php'; ?>

<html>

<head>

<link rel="stylesheet" href="<?php ViewHelper::createStaticUrl('css/global.css'); ?>" type="text/css">  

</head>

<body>

<div class="pageContainer">
    <h4>Add Article</h4>
    <form action="addsubmit" method="post">    
    <div>
        Author:
    </div>
    <div>
        <input type="text" name="author" />
    </div>
    <div>
        Title:
    </div>
    <div>
        <input type="text" name="title" />
    </div>
    <div>
        Body:
    </div>
    <div>
        <textarea cols="75" rows="8" name="body"></textarea>
    </div>
    <div>
        <input type="submit" value="Add"/>
    </div>
    </form>
</div>

</body>

</html>