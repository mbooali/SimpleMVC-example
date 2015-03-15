<?php require_once './utility/view_helper.php';session_start(); ?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="<?php ViewHelper::createStaticUrl('css/global.css'); ?>" type="text/css">  

</head>

<body bgcolor="black">
<table width="900" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td>
<table width="900" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" width="546px" height="107px"><img src="../static/images/header_left.jpg" /></td>
    <td rowspan="2" width="354px" height="158px" bgcolor="#000000" style="vertical-align:top"><img src="../static/images/header_right.jpg" /></td>
  </tr>
  <tr>
    <td width="78px" height="51px" bgcolor="black">&nbsp;</td>
    <td width="468px" align="center">
    
    <table width="468px" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="8px"><img src="../static/images/nav_left.jpg" /></td>
            <td style="background:url(../static/images/nav_filler.jpg);background-repeat:repeat-x;text-align:center"><a href="../" style="color:#FFF;text-decoration:none;">Home</a></td>
            <td width="3px"><img src="../static/images/nav_sep.jpg" /></td>
            <td style="background:url(../static/images/nav_filler.jpg);background-repeat:repeat-x;text-align:center"><a href="../about" style="color:#FFF;text-decoration:none;">About</a></td>
            <td width="3px"><img src="../static/images/nav_sep.jpg" /></td>
            <td style="background:url(../static/images/nav_filler.jpg);background-repeat:repeat-x;text-align:center"><a href="../user/index" style="color:#FFF;text-decoration:none;">User</a></td>
            <td width="3px"><img src="../static/images/nav_sep.jpg" /></td>
            <td style="background:url(../static/images/nav_filler.jpg);background-repeat:repeat-x;text-align:center"><a href="../user/register" style="color:#FFF;text-decoration:none;">Register</a></td>
            <td width="3px"><img src="../static/images/nav_sep.jpg" /></td>
            <td style="background:url(../static/images/nav_filler.jpg);background-repeat:repeat-x;text-align:center"><a href="../post" style="color:#FFF;text-decoration:none;">Post</a></td>
        </tr>
    </table>
    </td>
  </tr>
</table>

<table width="900" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="900px" height="10px">
    	<img src="../static/images/main_up.gif" />
    </td>
</tr>
<tr>
	<td style="background-image:url(../static/images/main_filler.gif);background-repeat:repeat-y" width="900px">
        <div style="margin-left:100px;padding:0;color:#FFF">
            <h2><?php echo $post->postTitle; ?></h2>
            <p>By <?php echo $post->postAuthor; ?> at <?php echo $post->created_on; ?></p>
            <p><?php echo $post->postBody; ?></p>
            
            <br>
            <span style="color:green;">Comments</span>
            <br/>
            <br/>
            <table>
            <?php foreach ($comments as $comment) { ?>
                <tr> <td style="color: fuchsia"><?php echo $comment->commentAuthor; ?> :</td><td><?php echo $comment->commentBody;?></td></tr>
            <?php } ?>
            </table>
            <br><br><br>
            <?php if ( ViewHelper::allowSendComment() ) 
            {	
                echo "<form action='postComment' method='post' >"
                    ." <table>"
                    ."<tr>"
                    ."<td>"
                    ."Post Comment"
                    ."</td>"
                    ."</tr>"
                    ."<tr>"
                    ."<td>"
                    ."<textarea name ='body' rows='8' cols='65'>"
                    ."</textarea>"
                    ."</td>"
                    ."</tr>"
                    ." </table>"
                    ."<input type='submit' value='Send' />"
                    ."<input type='hidden' name='postId' value='".$_GET['postId'] 
                    ."' /></form>";
                    
            }
			//inja bayad ajax tori beshe commentesh.
             ?>
        </div>
    </td>
</tr>
</table>
<table width="900" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="900px" height="99px">
    	<img src="../static/images/footer.gif" />
    </td>
</tr>
</table>
</td></tr></table>
</body>
</html>

<html>


























