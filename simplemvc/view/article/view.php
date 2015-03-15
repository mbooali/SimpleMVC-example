<?php require_once './utility/view_helper.php'; ?>

<html>

<head>

<link rel="stylesheet" href="<?php ViewHelper::createStaticUrl('css/global.css'); ?>" type="text/css">  

</head>

<body>

<div class="pageContainer">
    <h2><?php echo $article->title; ?></h2>
    <p>By <?php echo $article->author; ?> at <?php echo $article->created_on; ?>.<?php echo $article->created_on_ms; ?></p>
    <p><?php echo $article->body; ?></p>
</div>

</body>

</html>