<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
<link rel="icon" href="atlogo.png" type="image/png">
<!-- default favicon -->
<link rel="shortcut icon" href="atlogo.png" type="image/png">
<!-- wideley used favicon -->
<link rel="icon" href="at32.png" sizes="32x32" type="image/png">
<!-- for apple mobile devices -->
<link rel="apple-touch-icon-precomposed" href="at120.png" type="image/png" sizes="120x120">
<link rel="apple-touch-icon-precomposed" href="at152.png" type="image/png" sizes="152x152">
<!-- google tv favicon -->
<link rel="icon" href="at96.png" sizes="96x96" type="image/jpg"></head>
</head><?php # login.php
// This is the login page for the site.
require('config.inc.php');
$page_title = 'Login';
include('headerlogin.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	require(MYSQL);

	// Validate the treeid:
	if (!empty($_POST['link_name']))
	{
	    $e = mysqli_real_escape_string($dbc, $_POST['link_name']);
	}
	else
	{
	    $e = FALSE;
	    echo '<p class="error">You forgot to enter an ID!</p>';
	}

	// Validate the password:
	if (!empty($_POST['pass'])) 
	{
	    $p = trim($_POST['pass']);
	}
	else 
	{
	    $p = FALSE;
	    echo '<p class="error">You forgot to enter your password!</p>';
	}

	if ($e && $p) 
	{ // If everything's OK.

		// Query the database:
		$q = "SELECT user_id, first_name, user_level, pass, edu_cation, work_exp, email, last_name FROM users5 WHERE link_name='$e' AND active IS NULL";
		$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

		if (@mysqli_num_rows($r) == 1) 
		{   // A match was made.
            // Fetch the values:
			list($user_id, $first_name, $user_level, $pass, $edu_cation, $work_exp, $email, $last_name) = mysqli_fetch_array($r, MYSQLI_NUM);
			mysqli_free_result($r);

			// Check the password:
			if (password_verify($p, $pass)) 
			{
				// Store the info in the session:
				$_SESSION['user_id'] = $user_id;
				$_SESSION['first_name'] = $first_name;
				$_SESSION['last_name'] = $last_name;
				$_SESSION['link_name'] = $e;
				//Create folder based on user entry link_name
				 
				// Change the name below for the folder you want

                $dir = $_SESSION['link_name'];
                $file_to_write = 'index.php';
                $content_to_write =  
                //BEGIN AI CREATION EDIT WITH INTENSE CARE
                "
                <html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <title>Public Applytree</title>
<link rel=\"icon\" href=\"../atlogo.png\" type=\"image/png\">
<!-- default favicon -->
<link rel=\"shortcut icon\" href=\"../atlogo.png\" type=\"image/png\">
<!-- wideley used favicon -->
<link rel=\"icon\" href=\"../atlogo32.png\" sizes=\"32x32\" type=\"image/png\">
<!-- for apple mobile devices -->
<link rel=\"apple-touch-icon-precomposed\" href=\"../atlogo120.png\" type=\"image/png\" sizes=\"120x120\">
<link rel=\"apple-touch-icon-precomposed\" href=\"../atlogo152.png\" type=\"image/png\" sizes=\"152x152\">
<!-- google tv favicon -->
<link rel=\"icon\" href=\"../atlogo96.png\" sizes=\"96x96\" type=\"image/jpg\">
</head><?php # Script 18.1 - header.html
                require('../header.html');
                require('../config.inc.php');
                require('../mysqli_connect.php'); // Connect to the db.
                    // FUNCTION TIME 
                
                        function curPageURL() 
                        {
                            \$pageURL = 'http';
                            if (\$_SERVER[\"HTTPS\"] == \"on\") 
                            {
                                \$pageURL .= \"s\";
                            }
                            \$pageURL .= \"://\";
                            if (\$_SERVER[\"SERVER_PORT\"] != \"80\") 
                            {
                                \$pageURL .= \$_SERVER[\"SERVER_NAME\"].\":\".\$_SERVER[\"SERVER_PORT\"].\$_SERVER[\"REQUEST_URI\"];
                            }
                            else
                            {
                                \$pageURL .= \$_SERVER[\"SERVER_NAME\"].\$_SERVER[\"REQUEST_URI\"];
                            }
                            return \$pageURL;
                        }
                        \$fun = curPageURL();
                        \$fun = substr_replace(\$fun ,\"\", -1);
                        \$tree_name= basename(\$fun);
                        //END FUNCTION TIME
                    \$link_name = \$_SESSION['link_name'];
                  \$dir = \"../\$tree_name\"; // Define the directory to view.
                    \$files = scandir(\$dir); // Read all the images into an array.
                
                    // Display each image caption as a link to the JavaScript function:
                    
                    foreach (\$files as \$image) 
                    {
                        \$ext = strtolower(substr(\$image, -4));
                        if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png'))
                        {
                            if (substr(\$image, 0, 1) != '.') 
                            { // Ignore anything starting with a period.
                
                		        // Get the image's size in pixels:
                		        \$image_size = getimagesize(\"\$dir/\$image\");
                		        
                		        // Calculate the image's size in kilobytes:
                		        \$file_size = round((filesize(\"\$dir/\$image\")) / 1024) . \"kb\";
                		        
                		        // Determine the image's upload date and time:
                		        \$image_date = date(\"F d, Y H:i:s\", filemtime(\"\$dir/\$image\"));
                		        
                		        // Make the image's name URL-safe:
                		        \$image_name = urlencode(\$image);
                		        
                		        // Print the information:
                		        ?>	
                                <link rel=\"stylesheet\" href=\"../layout.css\">
                               <?php
                	        } // End of the IF.
                        } // End of extension check.
                    } // End of the foreach loop.
                    ?>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
                <link rel=\"icon\" href=\"../../php/pixlr-bg-result2.png\" type=\"image/png\">
<!-- default favicon -->
<link rel=\"shortcut icon\" href=\"../../php/pixlr-bg-result2.png\" type=\"image/png\">
<!-- wideley used favicon -->
<link rel=\"icon\" href=\"../../php/pixlr-bg-result32.png\" sizes=\"32x32\" type=\"image/png\">
<!-- for apple mobile devices -->
<link rel=\"apple-touch-icon-precomposed\" href=\"../../php/pixlr-bg-result120.png\" type=\"image/png\" sizes=\"120x120\">
<link rel=\"apple-touch-icon-precomposed\" href=\"../../php/pixlr-bg-result152.png\" type=\"image/png\" sizes=\"152x152\">
<!-- google tv favicon -->
<link rel=\"icon\" href=\"../../php/pixlr-bg-result96.png\" sizes=\"96x96\" type=\"image/jpg\">
                </head>
                <head>
                <script src='https://kit.fontawesome.com/a076d05399.js'></script>
                <link rel=\"stylesheet\" href=\"../layout.css\">
                </head>
                <div id=\"Content\">
                <body>
                </html>
                <div id=\"Header\"><?php 
                if (isset(\$_SESSION['link_name'])){
                echo\"{\$_SESSION['link_name']} \";} else { echo '';}?></div>
                <div id=\"Content\">
                </p>
                <?php
                
                // Welcome the user 
                    ?>
                    <link href=\"../style3.css\" rel=\"stylesheet\" type=\"text/css\">
                    <?php
                        // Display each video
                    if (isset(\$_SESSION['first_name'])) 
                    {
                	    echo \"<h1>&nbsp;&nbsp;\";
                	   ?><i class=\"fa fa-hand-peace-o\" style=\"font-size:30px;\"></i><?php
                	    echo \" {\$_SESSION['first_name']} \";
                	    echo \"{\$_SESSION['last_name']} \";
                	    echo \" Edit Mode</h1>\";
                    }
                    else 
                    {
                        echo\"\";
                    }
                    ?>
                        <style>
                        input[type=textversatile]:focus
                        {
                            background: #4d8a2c;
                            color:#ffffff;
                            border:3px solid #03611c;
                            box-shadow: 3px 3px 3px #14401c;
                        }
                        input[type=textversatile]
                        {
                            border:3px solid #03611c;
                            box-shadow: 3px 3px 3px #14401c;
                        }
                        input[type=textversatile]::placeholder
                        {
                            text-align: center;
                        }
                        input[type=textversatile]:focus::placeholder
                        {
                            color:#ffffff;
                        }
                        </style>
                <?php
                    \$link_name = \$_SESSION['link_name'];
                    \$dir = \"../\$link_name\"; // Define the directory to view.
                    
                    \$files = scandir(\$dir); // Read all the images into an array.
                
                    // Display each image caption as a link to the JavaScript function:
                     foreach (\$files as \$pdf)
                    {
                        \$ext = strtolower(substr(\$pdf, -4));
                        if((\$ext=='.pdf') OR (\$ext=='.PDF'))
                        {
                            if (substr(\$pdf, 0, 1) != '.') 
                            { // Ignore anything starting with a period.
                		        
                		        // Print the information:
                		        ?>
                                <link rel=\"stylesheet\" href=\"../layout.css\">
                                    <div id=\"Menupdfdisplay\"></div>
                                    <div id=\"Menupdfdisplaybottomhalf\"><embed src=\"<?php echo \$pdf ?>\" type=\"application/pdf\" width=\"100%\" height=\"100%\"></div>
                               <?php
                	        } // End of the IF.
                        } // End of extension check.
                    } // End of the foreach loop.
                    
                    foreach (\$files as \$image) 
                    {
                        \$ext = strtolower(substr(\$image, -4));
                        if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png'))
                        {
                            if (substr(\$image, 0, 1) != '.') 
                            { // Ignore anything starting with a period.
                
                		        // Get the image's size in pixels:
                		        \$image_size = getimagesize(\"\$dir/\$image\");
                		        
                		        // Calculate the image's size in kilobytes:
                		        \$file_size = round((filesize(\"\$dir/\$image\")) / 1024) . \"kb\";
                		        
                		        // Determine the image's upload date and time:
                		        \$image_date = date(\"F d, Y H:i:s\", filemtime(\"\$dir/\$image\"));
                		        
                		        // Make the image's name URL-safe:
                		        \$image_name = urlencode(\$image);
                		        
                		        // Print the information:
                		        ?>	
                                <link rel=\"stylesheet\" href=\"../layout.css\">
                                <div id=\"Menuphoto\"><?php
                                if (isset(\$image)) {
                                echo \"<img src=\".\$image.\" class='sixtyphoto' >\";
                                }
                                ?> </div>
                               <?php
                	        } // End of the IF.
                        } // End of extension check.
                    } // End of the foreach loop.
                    \$dir = \"../\$tree_name\"; // Define the directory to view.
                    \$files = scandir(\$dir); // Read all the images into an array.
                
                    // Display each image caption as a link to the JavaScript function:
                     foreach (\$files as \$pdf)
                    {
                        \$ext = strtolower(substr(\$pdf, -4));
                        if((\$ext=='.pdf') OR (\$ext=='.PDF'))
                        {
                            if (substr(\$pdf, 0, 1) != '.') 
                            { // Ignore anything starting with a period.
                		        
                		        // Print the information:
                		        ?>
                                <link rel=\"stylesheet\" href=\"../layout.css\">
                                <div id=\"Menupdfdisplay\"></div>
                                <div id=\"Menupdfdisplaybottomhalf\"><embed src=\"<?php echo \$pdf ?>\" type=\"application/pdf\" width=\"100%\" height=\"100%\"></div>
                               <?php
                	        } // End of the IF.
                        } // End of extension check.
                    } // End of the foreach loop.
                    
                        foreach (\$files as \$image) 
                        {
                            \$ext = strtolower(substr(\$image, -4));
                            if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png'))
                            {
                                if (substr(\$image, 0, 1) != '.') 
                                { // Ignore anything starting with a period.
                    
                    		        // Get the image's size in pixels:
                    		        \$image_size = getimagesize(\"\$dir/\$image\");
                    		        
                    		        // Calculate the image's size in kilobytes:
                    		        \$file_size = round((filesize(\"\$dir/\$image\")) / 1024) . \"kb\";
                    		        
                    		        // Determine the image's upload date and time:
                    		        \$image_date = date(\"F d, Y H:i:s\", filemtime(\"\$dir/\$image\"));
                    		        
                    		        // Make the image's name URL-safe:
                    		        \$image_name = urlencode(\$image);
                    		        
                    		        // Print the information:
                    		        ?>	
                                    <link rel=\"stylesheet\" href=\"../layout.css\">
                                    <div id=\"Menuphoto\"><?php
                                    if (isset(\$image)) {
                                   echo \"<img src=\".\$image.\" class='sixtyphoto' >\";
                                    }
                                    ?> </div>
                                   <?php
                	        } // End of the IF.
                        } // End of extension check.
                    } // End of the foreach loop.
                    
                    foreach (\$files as \$video) 
                    {
                        \$ext = strtolower(substr(\$video, -4));
                        if((\$ext=='.mp4') OR (\$ext=='.avi') OR (\$ext=='.mov') OR (\$ext=='.mov') OR (\$ext=='.3gp') OR (\$ext=='.mpeg') OR (\$ext=='.m3u8') OR (\$ext=='.ts') OR (\$ext=='.flv') OR (\$ext=='.wmv') OR (\$ext=='.MP4') OR (\$ext=='.AVI') OR (\$ext=='.MOV') OR (\$ext=='.3GP') OR (\$ext=='.MPEG') OR (\$ext=='.M3U8') OR (\$ext=='.TS') OR (\$ext=='.FLV') OR (\$ext=='.WMV'))
                        {
                            if (substr(\$video, 0, 1) != '.') 
                            { // Ignore anything starting with a period.
                		        // Print the information:
                		        ?>	
                                <link rel=\"stylesheet\" href=\"../layout.css\">
                                <div id=\"covervideo\">
                                <video src=\"<?php echo \$video;?>\" class=\"sixty\" width=\"400\" height=\"500\" controls></video>
                                </div>
                                <?php
                	        } // End of the IF.
                        } // End of extension check.
                    } // End of the foreach loop.
                    if (isset(\$_SESSION['first_name'])) {
                    include('../footernew.html');
                    }
                    else
                    {
                    include('../footerpublic.html');
                    }
                ?>
                "
            ;
            //END AI CREATION
            
            //If the existence of a directory is not true (directory does not exist under variable name $dir) then make the directory
            if(is_dir($dir) === false )
            {
                mkdir($dir);
            }
            
            $file = fopen($dir . '/' . $file_to_write,"w");
            fwrite($file, $content_to_write);
            fclose($file);
            
            $dir2 = $_SESSION['link_name'];
            $file_to_write2 = 'deletecoverphoto.php';
            
            $content_to_write2 = "<?php
\$files = glob('*'); // Read all the videos into an array.

foreach (\$files as \$image)
{
\$ext = strtolower(substr(\$image, -4));
if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png'))
{
unlink(\$image);
}
}
echo 'Cover Photo deleted. I bet the next one rocks';
?>
<html>
<a href=\"applytree.com/<?php echo \"{\$_SESSION['link_name']}\";?>/index.php\">Back to my tree</a>
<?php header('Location: ' . \$_SERVER['HTTP_REFERER']); ?>
</html>
"
;
            //If the existence of a directory is not true (directory does not exist under variable name $dir) then make the directory
            mkdir($dir2);
            
            $file2 = fopen($dir2. '/' . $file_to_write2, "w");
            fwrite($file2, $content_to_write2);
            fclose($file2);
            
            $dir3 = $_SESSION['link_name'];
            $file_to_write3 = 'deletecovervideo.php';
            
            $content_to_write3 = "<?php
\$files = glob('*'); // Read all the videos into an array.

foreach (\$files as \$image)
{
\$ext = strtolower(substr(\$image, -4));
if((\$ext=='.mp4') OR (\$ext=='.avi') OR (\$ext=='.mov') OR (\$ext=='.3gp') OR (\$ext=='.mpeg') OR (\$ext=='.m3u8') OR (\$ext=='.ts') OR (\$ext=='.flv') OR (\$ext=='.wmv') OR (\$ext=='.MP4') OR (\$ext=='.AVI') OR (\$ext=='.MOV') OR (\$ext=='.3GP') OR (\$ext=='.MPEG') OR (\$ext=='.M3U8') OR (\$ext=='.TS') OR (\$ext=='.FLV') OR (\$ext=='.WMV'))
{
unlink(\$image);
}
}
echo 'Cover Video deleted. I bet the next one rocks';
?>
<html>
<a href=\"<?php echo \"{\$_SESSION['link_name']}\";?>/index.php\">Back to my tree</a>
<?php header('Location: ' . \$_SERVER['HTTP_REFERER']); ?>
</html>
"
;
            //If the existence of a directory is not true (directory does not exist under variable name $dir) then make the directory
            mkdir($dir3);
            
            $file3 = fopen($dir3. '/' . $file_to_write3, "w");
            fwrite($file3, $content_to_write3);
            fclose($file3);
            
            $dirpdf = $_SESSION['link_name'];
            $file_to_writepdf = 'deletepdf.php';
            
            $content_to_writepdf = "<?php
\$files = glob('*'); // Read all the videos into an array.

foreach (\$files as \$pdf)
{
\$ext = strtolower(substr(\$pdf, -4));
if((\$ext=='.pdf') OR (\$ext=='.PDF'))
{
unlink(\$pdf);
}
}
echo 'PDF deleted. I bet the next one rocks';
?>
<html>
<a href=\"<?php echo \"{\$_SESSION['link_name']}\";?>/index.php\">Back to my tree</a>
<?php header('Location: ' . \$_SERVER['HTTP_REFERER']); ?>
</html>
"
;
            //If the existence of a directory is not true (directory does not exist under variable name $dir) then make the directory
            mkdir($dirpdf);
            
            $filepdf = fopen($dirpdf. '/' . $file_to_writepdf, "w");
            fwrite($filepdf, $content_to_writepdf);
            fclose($filepdf);
            
            // This code will show the created file from the created folder on screen
            $name = $_SESSION['first_name'];
            $id = $_SESSION['user_id'];
            $url = BASE_URL . '/' . $dir . ''; // Define the URL.
            ob_end_clean(); // Delete the buffer.
            header("Location: $url");
            exit(); // Quit the script.
			}
			else
			{ // password_verify() function else: Line 46
				echo '<p class="error">Either the ID and password entered do not match those on file or you have not yet activated your account.</p>';
			}
		}
		else
		{ // No match was made.
			echo '<p class="error">Either the ID and password entered do not match those on file or you have not yet activated your account.</p>';
		}
	}
	else
	{ // If everything wasn't OK.
		echo '<p class="error">Please try again.</p>';
	}
	mysqli_close($dbc);
} // End of SUBMIT conditional.
?>
<div id="Content">
<div id="Cursive"> <h1>Applytree Public Login:</h1></div>
<form action="loginpublic.php" method="post">
	    <style>
        input[type=treeid]{
            height:50px;
            width:50%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 1px 0.67px 0.67px #219136;
            outline-width: 0;
        }
        input[type=treeid]:focus{
            -webkit-appearance: none;
            background:#7cdc69;
            border:9px solid #03611c;
            box-shadow: 3px 2px 2px #219136;
        }
        input[type=treeid]::placeholder{
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: center;
        }
        input[type=treeid]:focus::placeholder{
            color:#000000;
        }
        input[type=password]{
            height:50px;
            width:50%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 1px 1px 1px #14401c;
            outline-width: 0;
        }
        input[type=password]:focus{
            -webkit-appearance: none;
            background: #7cdc69;
            border:9px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
        }
        input[type=password]::placeholder{
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: center;
        }
        input[type=password]:focus::placeholder{
            color:#000000;
        }
        input[type="submit"]
        {
            height:50px;
            width:50%;
            font-size:20px;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            cursor:grab;
            color: #ffffff;
            padding: 12px;
            background-color: #457d27;
            border: 5px solid #006633;
            border-top-right-radius: 2px 11.67px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            height:100px;
            font-size:40px;
        }
        input[type="submit"]:focus
        {
            -webkit-appearance: none;
            cursor:grabbing;
            color: #ffffff;
            padding: 15px;
            background-color: #26bf4e;
            border: 5px solid #006633;
            border-top-right-radius:250px 150px;
            border-top-left-radius:250px 150px;
            border-bottom-left-radius:75px 15px;
            border-bottom-right-radius:150px 75px;
        }
        </style>
        <script>
function treeidentity(){
document.getElementById('box0').placeholder = "ID (not email)";
}
function treeidentityreturn(){
  document.getElementById('box0').placeholder = "ID";
}
function passworded(){
document.getElementById('box00').placeholder = "Password (not TreeKey)";
}
function passwordedreturn(){
document.getElementById('box00').placeholder = "Password";
}
        </script>
	    <p><input type="treeid" autocapitalize="none" onfocus="treeidentity()" onblur="treeidentityreturn()" id="box0" placeholder="ID" name="link_name" size="32" maxlength="60" autofocus="autofocus"></p>
	    <p><input type="password" onfocus="passworded()" onblur="passwordedreturn()" id="box00" placeholder="Password" name="pass" size="32"></p>
	    <br><br><input type="submit" name="submit" value="Login"></div>
</form>
</div>
<style>
.verifyhover:hover {
    font-family: lucida calligraphy, cursive;
    color: #ffffff;
    border-top-left-radius:12px 36px;
    border-bottom-right-radius:40px 40px;
    border-bottom-left-radius:51px 72px;
    border-top-right-radius:151px 72px;
    background-color:#87ceeb;
    border: 2px solid #338cb0;
    text-shadow: 1px 1px #d8dddf;
    padding-left: 30px;
    padding-right: 30px;

}
.verifyhover:hover::after {
    font-family: lucida calligraphy, cursive;
    color: #00000;
    border-top-right-radius:12px 36px;
    border-bottom-right-radius:40px 40px;
    border-bottom-left-radius:51px 72px;
    border-top-left-radius:151px 72px;
    background-color:#e3d6ff;
    border: 2px solid 	purple;
    text-shadow: 1px 1px #d8dddf;
    padding-top: 30px;
    content: 'Verify Account';
}
</style>
<?php include('footerlogin.html');?>
