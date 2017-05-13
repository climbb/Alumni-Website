<html>


<head>

</head>
 <?php

 		 include("loginheader.php");
 if($checkSessionExist > 0)
 {
	$username = CheckUserName ($sessionID);	
	$powerLevel = CheckPowerLevel($sessionID);


	?>
    <script> 
	
	$(document).on('click', '.replybutton', function() {
		var commentID = ($(this).attr('id'));
	 $("div[class='reply-bigcontainer'][id='" + commentID + "']").slideToggle(400);
		});

	$(document).on('click', '.comment-textarea-example-button', function() {
	 $("div[class='comment-textarea-example']").slideToggle(400);
		});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="../lib/jquery-1.8.2.min.js"></script>
<script type ="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type ="text/javascript" src="source/jquery.fancybox.js?v=2.1.3"></script>
<link rel ="stylesheet" type ="text/css" href="source/jquery.fancybox.css?v=2.1.2" media="screen" />
<link rel ="stylesheet" type ="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type ="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<link rel ="stylesheet" type ="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type ="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type ="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});

	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
    <body id="commentBackground">

<div class="SignUpLoginTopic">Comment<br></div>
<div class='comment-container'>
  <div class="comment-textareaBox">
                  <form method="post" action="post.php">
   <textarea  title="Write and share with others" name="content" placeholder="Write and share with others" role="textbox" aria-autocomplete="list" autocomplete="off" aria-expanded="false" id="comment" aria-label="Write and share with others" aria-haspopup="true" style=""></textarea>
     <input type="hidden" name="submitted" value="true" />
	 <input type="hidden" name="reply" value="0" />
<input name="username" type="hidden" value="<?php echo $username ?>">


    <div class="comment-textarea-ButtonContainer">
	<div class="comment-textarea-example-button">
	<a href='javascript:;'>Use the special code!</a></div>
    	<div class="comment-textarea-Button-Box">
        <input class="comment-textarea-Button" type="submit" name ="submit" value="post">
            </form>
    
  </div></div></div>
            <!-- end of updateHolder //-->
		<div class="comment-textarea-example">
        <table>
        <tr><td width="124">Image Code</td><td width="232">[img]IMAGE LINK[/img]</td></tr>
		<tr><td>URL Code</td><td>[url]URL LINK[/url]</td></tr>
		<tr><td>Youtube Code</td><td>[youtube]YOUTUBE CODE[/youtube]</td></tr>
        </table>
		
		</div>
<?php


		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		else {
			$page="1";}
			$firstpost = $page*10;	

		$sql="SELECT COUNT(*) AS CountPost FROM Comment";
		$conn=odbc_connect('sba','','',SQL_CUR_USE_ODBC);
		$rs=odbc_exec($conn,$sql);
		$postnumber=odbc_result($rs,"CountPost");

		$postCount= $postnumber - $firstpost;
		if( $postCount >= 0)
		{ $showPost = 10; }
		if ( $postCount < 0 )
		{ 
			if ( $postCount <= -10 ) {
				$firstpost = 10;
				$showPost = 10;
			}
			else {
		$showPost = 10 + $postCount; }
		}
		$sql="SELECT * FROM (SELECT TOP " . $showPost . " * FROM (SELECT TOP " . $firstpost . " * FROM Comment ORDER BY CommentID desc) ORDER BY CommentID ASC) ORDER BY CommentID DESC";
		$rs=odbc_exec($conn,$sql);
		odbc_longreadlen( $rs, 1000000);
		while( odbc_fetch_row( $rs ) )
		{
			$id= odbc_result( $rs, 1 );
			$postUserName= odbc_result( $rs, 2 );
			$postTime= odbc_result( $rs, 3 );
			$postContent= uni_decode(odbc_result( $rs, 4 ));
								$postContent= str_replace("<","&#60;",$postContent);
		$postContent= str_replace(">","&#62;",$postContent);
		$postContent= str_replace("'","&#039;",$postContent);
		$postContent = nl2br($postContent);
						$sql="SELECT COUNT(*) AS CountReplyComment FROM Reply WHERE ReplyMother='" . $id . "'";
		$countReply=odbc_exec($conn,$sql);
		$replyNumber=odbc_result($countReply,"CountReplyComment");
			$sql="SELECT * FROM UserTable WHERE UserName='" . $postUserName . "'";
		$rs2=odbc_exec($conn,$sql);
		$userLoginName=odbc_result($rs2,2);
		$avatarType=odbc_result($rs2,13);
					//Convert youtube code
		$postContent= str_replace("[youtube]","	<iframe width='480' height='270' src='http://www.youtube.com/embed/",$postContent);
		$postContent= str_replace("[/youtube]","'frameborder='0' allowfullscreen></iframe>",$postContent);
		
					//Convert image code
					   preg_match_all('/{img}([^<]*){#img}/', $postContent, $match, PREG_SET_ORDER);
		

		
		
$replaceTime = 0;

				while (isset($match[$replaceTime][1]))
				{
					
				$postContent= preg_replace("/{img}/","<a class='fancybox-effects-a' href='" . $match[$replaceTime][1] . "' data-fancybox-group='gallery" . $id . "' title=''><img src='",$postContent,1);
		$postContent= preg_replace("/{#img}/","' alt='' style='max-width: 500px';/></a>",$postContent, 1);	
				$replaceTime = $replaceTime+1;
			  }
			  
			     preg_match_all('/{url}([^<]*){#url}/', $postContent, $match, PREG_SET_ORDER);
		  $replaceTime2 = 0;

			while (isset($match[$replaceTime2][1]))
				{
					
				$postContent= preg_replace("/{url}/","<a href='http://" . $match[$replaceTime2][1] . "'>",$postContent,1);
		$postContent= preg_replace("/{#url}/","</a>",$postContent, 1);	
				$replaceTime2 = $replaceTime2+1;
			  }


					//Convert bold code
		$postContent= str_replace("[b]","<b>",$postContent);
		$postContent= str_replace("[/b]","</b>",$postContent);
		
		echo "
	<div class='comment-box'>
	<div class='comment-padding'>
    	<div class='comment-header'>
        	<div class='comment-avatar'>
			";
		$sql="SELECT AvatarUploaded AS AvatarExist FROM UserTable WHERE UserLoginName='" . $userLoginName . "'";
		$conn=odbc_connect('sba','','');
		$rs3=odbc_exec($conn,$sql);
		$avatarExist=odbc_result($rs3,"AvatarExist");
		if ($avatarExist == 0)
		{ echo"<img src='avatars/default-avatar.png'";}
		else
		{	echo"
            <img src='avatars/".$userLoginName.".".$avatarType."'";}
			echo"style='max-height:50px;max-width:50px;  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  margin-bottom:3px;'>
            </div>
            <div class='comment-username'>".$postUserName."</div>
			 </div>
            <div class='comment-content' id='" . $id . "'>".$postContent."</div>
            <div class='comment-footer'>
            	<div class='comment-select'>
            <div class='comment-select-box'><div class='replybutton' id='" . $id . "'><a href='javascript:;'><span class='webSymbol'>&#104;</span>&nbsp;Reply (" . $replyNumber .")</div></a></div><div class='comment-select-box'><a href='comment_post.php?commentID=" . $id . "' id='trans'><span class='webSymbol'>&#101;</span>&nbsp;Detail</a></div>";
			if ($powerLevel == 1  or $username == $postUserName) {
				echo "<div class='comment-select-delete'><a href='deletepost.php?commentID=" . $id . "'><span class='webSymbol'>&#215;</span>&nbsp;Delete</div></a>";
			}
			
		echo "
             </div>
            	<div class='comment-date'>
                ".$postTime."
                </div>
  
        </div>";
		//REPLY
		echo "
		<div class='reply-bigcontainer' id='" . $id . "'>";
		if ($replyNumber>0)
			{
		$sql="SELECT * FROM Reply WHERE ReplyMother='" . $id . "' ORDER BY CommentID ASC";
		$conn=odbc_connect('sba','','',SQL_CUR_USE_ODBC);
		$rs4=odbc_exec($conn,$sql);
				odbc_longreadlen( $rs4, 1000000);
		while( odbc_fetch_row( $rs4 ) )
		{
			$replyID= odbc_result( $rs4, 1 );
			$replyPostUserName= odbc_result( $rs4, 2 );
			$replyPostTime= odbc_result( $rs4, 3 );
			$replyPostContent= uni_decode(odbc_result( $rs4, 4 ));
			$replyPostContent= str_replace("<","&#60;",$replyPostContent);
		$replyPostContent= str_replace(">","&#62;",$replyPostContent);
		$replyPostContent= str_replace("'","&#039;",$replyPostContent);
		$replyPostContent=nl2br($replyPostContent);
					     preg_match_all('/{url}([^<]*){#url}/', $replyPostContent, $match, PREG_SET_ORDER);
		  $replaceTime2 = 0;

			while (isset($match[$replaceTime2][1]))
				{
					
				$replyPostContent= preg_replace("/{url}/","<a href='http://" . $match[$replaceTime2][1] . "'>",$replyPostContent,1);
		$replyPostContent= preg_replace("/{#url}/","</a>",$replyPostContent, 1);	
				$replaceTime2 = $replaceTime2+1;
			  }
		//Convert bold code
		$replyPostContent= str_replace("[b]","<b>",$replyPostContent);
		$replyPostContent= str_replace("[/b]","</b>",$replyPostContent);
			$sql="SELECT * FROM UserTable WHERE UserName='" . $replyPostUserName . "'";
		$rs5=odbc_exec($conn,$sql);
		$ReplyUserLoginName=odbc_result($rs5,2);
		$ReplyAvatarType=odbc_result($rs5,13);
			echo"
    <div class='reply-container'>
        <div class='reply-bigbox'>
                <div class='reply-rightbox'><div class='reply-username'>";
				$sql="SELECT AvatarUploaded AS AvatarExist FROM UserTable WHERE UserName='" . $replyPostUserName . "'";
		$conn=odbc_connect('sba','','');
		$rs6=odbc_exec($conn,$sql);
		$ReplyAvatarExist=odbc_result($rs6,"AvatarExist");
		if ($ReplyAvatarExist == 0)
		{ echo"<img src='avatars/default-avatar.png'";}
		else
		{	echo"
            <img src='avatars/".$ReplyUserLoginName.".".$ReplyAvatarType."'";}
			echo"class='reply-avatar'>
                	" . $replyPostUserName . "</div>
                	<div class='reply-content'>" . $replyPostContent . "</div>
                	<div class='reply-footer'>
                    	        " . $replyPostTime ."  
                    </div>
                </div></div></div>
                         
        ";
		}}
		echo"
    <div class='reply-textarea-container'>
       	<div class='reply-textarea-title'>
        Reply</div>
                         <form method='post' action='postreply.php'>
   <textarea  name='content'  role='textbox' aria-autocomplete='list' autocomplete='off' aria-expanded='false' id='reply'  aria-haspopup='true' style=''></textarea>
     <input type='hidden' name='submitted' value='true' />
	 <input type='hidden' name='reply' value='1' />
	 	 <input type='hidden' name='replyMother' value='" . $id . "' />
<input name='username' type='hidden' value='" . $username ."'>


    <div class='comment-textarea-ButtonContainer'>
    	<div class='comment-textarea-Button-Box'>
        <input class='comment-textarea-Button' type='submit' name ='submit' value='Submit'>
            </form>
        </div></div></div></div>
		</div>
	</div>"

;		
}
?> <div class="backToTop"> <?php
		$pageCount =  ceil($postnumber / 10);
		$genPage =1;
		while ($genPage <= $pageCount)
		{
			if ($page == $genPage)
			{
			echo $genPage . " ";
			}
			else {
			echo "<a href='?page=" . $genPage . "'>" . $genPage . " </a>";
			}
			$genPage++;
		}
 }
	?>
   </div>
   <!--// Update Holder -->
</body>
</html>