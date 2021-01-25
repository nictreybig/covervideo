<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
<link rel="icon" href="pixlr-bg-result2.png" type="image/png">
<!-- default favicon -->
<link rel="shortcut icon" href="pixlr-bg-result2.png" type="image/png">
<!-- wideley used favicon -->
<link rel="icon" href="pixlr-bg-result32.png" sizes="32x32" type="image/png">
<!-- for apple mobile devices -->
<link rel="apple-touch-icon-precomposed" href="pixlr-bg-result120.png" type="image/png" sizes="120x120">
<link rel="apple-touch-icon-precomposed" href="pixlr-bg-result152.png" type="image/png" sizes="152x152">
<!-- google tv favicon -->
<link rel="icon" href="pixlr-bg-result96.png" sizes="96x96" type="image/jpg">
</head><?php # login.php
// This is the login page for the site.
require('config.inc.php');
$page_title = 'Login';
include('headerlogin.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	require(MYSQL);

	// Validate the id:
	if (!empty($_POST['link_name']))
	{
	    $e = mysqli_real_escape_string($dbc, $_POST['link_name']);
	}
	else
	{
	    $e = FALSE;
	    echo '<p class="error">You forgot to enter your id!</p>';
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
		$q = "SELECT user_level, pass, edu_cation, work_exp, link_name FROM users WHERE link_name='$e' AND active IS NULL";
		$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

		if (@mysqli_num_rows($r) == 1) 
		{   // A match was made.
            // Fetch the values:
			list($user_level, $pass, $edu_cation, $work_exp, $lnk) = mysqli_fetch_array($r, MYSQLI_NUM);
			mysqli_free_result($r);

			// Check the password:
			if (password_verify($p, $pass)) 
			{
				// Store the info in the session:
				$_SESSION['user_id'] = $user_id;
				$_SESSION['first_name'] = $lnk;
				$_SESSION['link_name'] = $e;
				$_SESSION['edit_access'] = $e;
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
    <title>Protected CV</title>
<link rel=\"icon\" href=\"../pixlr-bg-result2.png\" type=\"image/png\">
<!-- default favicon -->
<link rel=\"shortcut icon\" href=\"../pixlr-bg-result2.png\" type=\"image/png\">
<!-- wideley used favicon -->
<link rel=\"icon\" href=\"../pixlr-bg-result32.png\" sizes=\"32x32\" type=\"image/png\">
<!-- for apple mobile devices -->
<link rel=\"apple-touch-icon-precomposed\" href=\"../pixlr-bg-result120.png\" type=\"image/png\" sizes=\"120x120\">
<link rel=\"apple-touch-icon-precomposed\" href=\"../pixlr-bg-result152.png\" type=\"image/png\" sizes=\"152x152\">
<!-- google tv favicon -->
<link rel=\"icon\" href=\"../pixlr-bg-result96.png\" sizes=\"96x96\" type=\"image/jpg\">
</head><?php # Script 18.1 - header.html
                // This page begins the HTML header for the site.
                include('../headerlevellogin.html');
                require('../config.inc.php');
                require('../mysqli_connect.php'); // Connect to the db.
                ?>
                <html>
                <meta charset=\"utf-8\">
                <title><?php 
                if (isset(\$_SESSION['link_name'])){
                echo\"{\$_SESSION['link_name']} \";} else { echo '';}?></title>
                <head>
                <?php
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
                    \$dir = \"../\$link_name\"; // Define the directory to view.
                    \$files = scandir(\$dir); // Read all the images into an array.
                
                    // Display each image caption as a link to the JavaScript function:
                    
                    foreach (\$files as \$image) 
                    {
                        \$ext = strtolower(substr(\$image, -4));
                        if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png') OR (\$ext=='.tif') OR (\$ext=='.eps') OR (\$ext=='.TIF') OR (\$ext=='.EPS') OR (\$ext=='.JPG') OR (\$ext=='JPEG') OR (\$ext=='.PNG'))
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
                <link rel=\"icon\" href=\"../pixlr-bg-result2.png\" type=\"image/png\">
                <!-- default favicon -->
                <link rel=\"shortcut icon\" href=\"../pixlr-bg-result2.png\" type=\"image/png\">
                <!-- wideley used favicon -->
                <link rel=\"icon\" href=\"../pixlr-bg-result32.png\" sizes=\"32x32\" type=\"image/png\">
                <!-- for apple mobile devices -->
                <link rel=\"apple-touch-icon-precomposed\" href=\"../pixlr-bg-result120.png\" type=\"image/png\" sizes=\"120x120\">
                <link rel=\"apple-touch-icon-precomposed\" href=\"../pixlr-bg-result152.png\" type=\"image/png\" sizes=\"152x152\">
                <!-- google tv favicon -->
                <link rel=\"icon\" href=\"../pixlr-bg-result96.png\" sizes=\"96x96\" type=\"image/jpg\">
                </head>
                <head>
                <script src='https://kit.fontawesome.com/a076d05399.js'></script>
                <link rel=\"stylesheet\" href=\"../layout.css\">
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
                if (isset(\$_SESSION['user_level']))
                {
                    ?>
                    <link href=\"../style3.css\" rel=\"stylesheet\" type=\"text/css\">
                    <?php
                        // Display each video
                }
                else
                {
                    if (isset(\$_SESSION['first_name']))
                    {
                	    echo \"<h1>&nbsp;&nbsp;\";
                	   ?><i class=\"fa fa-hand-peace-o\" style=\"font-size:30px;\"></i><?php
                	    echo \" {\$_SESSION['first_name']} \";
                	    echo \" Edit Mode</h1>\";
                    }
                    else 
                    {
                        echo\"\";
                    }
                
                    if (isset(\$_SESSION['first_name'])) 
                    {
                	   echo'';
                    }
                    else
                    {
                
                        // Time to dance with the cvkey
                        if (\$_SERVER['REQUEST_METHOD'] == 'POST') 
                        {
                            require('../mysqli_connect.php'); // Connect to the db.
                
                            // Validate the tree name:
                	        if (!empty(\$_POST['link_name'])) 
                	        {
                		        \$n = mysqli_real_escape_string(\$dbc, \$_POST['link_name']);
                	        }
                	        else
                	        {
                		        \$n = FALSE;
                		        echo '<p class=\"error\">You forgot to enter a link name!</p>';
                	        }
                 
                            if (!empty(\$_POST['tree_key'])) 
                            {
                		        \$key = trim(\$_POST['tree_key']);
                	        }
                	        else
                	        {
                		        \$key = FALSE;
                		        echo '<p class=\"error\">You forgot to enter a key!</p>';
                	        }
                	
                	        if (\$n && \$key) 
                	        { // If everything's OK.
                		        
                		        // Query the database:
                		        \$q = \"SELECT user_id, user_level, work_exp, tree_key FROM users WHERE link_name='\$n'\";
                		        \$r = mysqli_query(\$dbc, \$q) or trigger_error(\"Query: \$q
                                <br>MySQL Error: \" . mysqli_error(\$dbc));
                
                		        if (@mysqli_num_rows(\$r) == 1)
                		        { // A match was made.
                
                			        // Fetch the values:
                    			    list(\$user_id, \$user_level, \$work_exp, \$tree_key) = mysqli_fetch_array(\$r, MYSQLI_NUM);
                			        mysqli_free_result(\$r);
                
                			        // Check the password:
                			        if (password_verify(\$key, \$tree_key)) 
                			        {
                			            \$_SESSION['user_level'] = \$n; 
                			            \$url = BASE_URL . '/' . \$n . ''; // Define the URL.
                				        ob_end_clean(); // Delete the buffer.
                				        header(\"Location: \$url\");
                				        exit(); // Quit the script.
                			        }
                			        else 
                			        {
                			            echo '<p class=\"error\">The id does not match the key.</p>'; 
                			        }
                		        }
                		        else
                		        { // No match was made.
                			        echo '<p class=\"error\">Issues with your id and password, unspecified. Did you click the space ship?</p>';
                		        }
                	        }
                	        else 
                	        { // If everything wasn't OK.
                		        echo '<p class=\"error\">Please try again.</p>';
                	        }
                	        mysqli_close(\$dbc);
                        } //End of main submit conditional 
                        ?><title>bo</title>
                        &nbsp;&nbsp;&nbsp; <i class=\"fas fa-lock\" style=\"font-size:30px;\"></i> <?php echo \$tree_name;?>
                        <div id = \"Menu88\">
                        <h6> Please confirm 
                        <div id=\"treeidbackground\"> id </div> and <div id=\"treekeybackground\">key </div> to view <div id=\"treeidbackground\"><?php echo \$tree_name;?></div></h6>
                        <style>
                        input[type=\"password\"]
                        {
                            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
                            color: #000000;
                            background: #7cdc69;
                            border:7px solid #03611c;
                            box-shadow: 5px 5px 5px #14401c;
                            border-top-left-radius: 3.33px 2.33px;
                            border-top-right-radius: 10px 25px;
                            border-bottom-left-radius: 11.67px 10px;
                            border-bottom-right-radius: 11.67px 1px;
                        	font-family: \"fontello\";
                        	text-align: center;
                        	font-style: normal;
                        	font-weight: normal;
                        	speak: none;
                        	/* For safety - reset parent styles, that can break glyph codes*/
                        	font-variant: normal;
                        	text-transform: none;
                        	/* Font smoothing. That was taken from TWBS */
                        	-webkit-font-smoothing: antialiased;
                        	-moz-osx-font-smoothing: grayscale;
                        	line-height: 20px;
                        	text-shadow: 1px 1px 1px rgba(11, 156, 50, 0.3);
                        	letter-spacing: 1px;
                        }
                        
                        input[type=\"password\"]:focus
                        {
                            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
                            color: #000000;
                            background: #7cdc69;
                            border:7px solid #03611c;
                            box-shadow: 5px 5px 5px #14401c;
                            border-top-left-radius: 3.33px 2.33px;
                            border-top-right-radius: 10px 25px;
                            border-bottom-left-radius: 11.67px 10px;
                            border-bottom-right-radius: 11.67px 1px;
                            -webkit-font-smoothing: antialiased;
                            -moz-osx-font-smoothing: grayscale;
                            line-height: 20px;
                        }
                        input[type=password]:focus::placeholder
                        {
                            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
                            color:#000000;
                        }
                        input[type=\"submit\"]
                        {
                            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
                            font-family: \"Lucida Sans Unicode\", \"Lucida Grande\", sans-serif;
                            cursor:grab;
                            color: #ffffff;
                            padding: 12px;
                            background-color: #457d27;
                            border: 5px solid #006633;
                            border-top-right-radius: 2px 11.67px;
                            border-top-left-radius: 10px 25px;
                            border-bottom-right-radius: 11.67px 10px;
                            border-bottom-left-radius: 11.67px 1px;
                        }
                        input[type=\"submit\"]:focus
                        {
                            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
                            cursor:grab;
                            color: #ffffff;
                            padding: 15px;
                            background-color: #26bf4e;
                            border: 5px solid #006633;
                            border-top-left-radius: 3.33px 2.33px;
                            border-top-right-radius: 10px 25px;
                            border-bottom-left-radius: 11.67px 10px;
                            border-bottom-right-radius: 11.67px 1px;
                        }
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
                        <form action=\"index.php\" method=\"post\">
                        <p><input type=\"textversatile\" autocapitalize=\"none\" autocomplete=\"off\" autocorrect=\"off\" autocapitalize=\"none\" spellcheck=\"false\" placeholder=\"ubi\" name=\"link_name\" value=\"<?php echo \$tree_name;?>\" size=\"20\" maxlength=\"60\"></p>
                        <style>
                        /*
                            Copyright [2020] [HEHE INC]
    
                            Licensed under the Apache License, Version 2.0 (the License);
                            you may not use this file except in compliance with the License.
                            You may obtain a copy of the License at
    
                            http://www.apache.org/licenses/LICENSE-2.0
    
                            Unless required by applicable law or agreed to in writing, software
                            distributed under the License is distributed on an AS IS BASIS,
                            WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
                            See the License for the specific language governing permissions and
                            limitations under the License.
                        */
                        @font-face 
                        {
                	    font-family: 'fontello';
                	    src: url('./font/fontello.eot?2022');
                	    src: url('./font/fontello.eot?2022#iefix') format('embedded-opentype'),
                	    url('./font/fontello.woff?2022') format('woff'),
                	    url('./font/fontello.ttf?2022') format('truetype'),
                	    url('./font/fontello.svg?2022#fontello') format('svg');
                	        url('./font/fontello.woff2?2022') format('woff2'),
                	        url('./font/fontello.woff?2022') format('woff'),
                	        url('./font/fontello.ttf?2022') format('truetype'),
                	        url('./font/fontello.svg?2022#fontello') format('svg');
                	    font-weight: normal;
                	    font-style: normal;
                	    font-color: green;
                        }
                
                        input[type=\"password\"] 
                        {
                	        font-family: \"fontello\";
                	        font-style: normal;
                	        font-weight: normal;
                	        speak: none;
                	        /* For safety - reset parent styles, that can break glyph codes*/
                	        font-variant: normal;
                	        text-transform: none;
                	        /* Font smoothing.*/
                	        -webkit-font-smoothing: antialiased;
                	        -moz-osx-font-smoothing: grayscale;
                	        /* Uncomment for 3D effect */
                	        /* text-shadow: 1px 1px 1px rgba(127, 127, 127, 0.3); */
                	        /* add spacing to better separate each image */
                	        letter-spacing: 2px;
                        }
                        .noclick {
                                    width:56%;
                                    cursor: default;
                                    color: white;
                                    background-color: forestgreen;
                                    border:3px solid #03611c;
                                    box-shadow: 3px 3px 3px #14401c;
                                    border-top-left-radius: 3.33px 2.33px;
                                    border-top-right-radius: 10px 25px;
                                    border-bottom-left-radius: 11.67px 10px;
                                    border-bottom-right-radius: 11.67px 1px;
                                }
                        button[type=button]
                            {
                                    display: inline;
                                    height:68px;
                                    width: 40%;
                                    font-size:21px;
                            }
                            
                        button[type=button]:hover::after
                            {
                                border:5px solid #ffffff;
                                box-shadow: 3px 3px 3px #ffffff;
                                border-top-right-radius: 3.33px 2.33px;
                                border-top-left-radius: 10px 25px;
                                border-bottom-right-radius: 11.67px 10px;
                                border-bottom-left-radius: 11.67px 1px;
                                content: \"✓\";
                                color:#ffffff;
                                background-color: #14401c;
                            }
                        </style>
                	    <p><input type=\"password\" placeholder=\"key\" autocapitalize=\"none\" autofocus=\"autofocus\" id=\"seekey\" name=\"tree_key\" size=\"20\">&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"noclick\" tabindex=\"-1\" onclick=\"showit()\" onmouseover=\"showit()\">&nbsp;<i class='fa fa-eye fa-rotate-180'></i><i class='fa fa-eye fa-rotate-180'></i> <i class='fa fa-key fa-flip-horizontal'></i></button></p>
                	    <script>
                            function showit() {
                                var x = document.getElementById(\"seekey\");
                                setTimeout(function(){x.type = \"textversatile\";}, 0);
                                setTimeout(function(){x.type = \"password\";}, 3000);
                            }
                        </script>
                        <div align=\"center\"><input type=\"submit\" name=\"submit\" value=\"Enter\"></div>
                        </form>
                        </div>
                        <?php
                        include('../footercvkey.html');
                    }
                }
                
                if (isset(\$_SESSION['first_name']))
                {
                    \$link_name = \$_SESSION['link_name'];
                    \$dir = \"../\$link_name\"; // Define the directory to view.
                    
                    \$files = scandir(\$dir); // Read all the images into an array.
                
                    // Display each image caption as a link to the JavaScript function:
                    foreach (\$files as \$image) 
                    {
                        \$ext = strtolower(substr(\$image, -4));
                        if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png') OR (\$ext=='.tif') OR (\$ext=='.eps') OR (\$ext=='.TIF') OR (\$ext=='.EPS') OR (\$ext=='.JPG') OR (\$ext=='JPEG') OR (\$ext=='.PNG'))
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
                		        \$imageshow = \"photo/\". \$image;
                		        // Print the information:
                		        ?>	
                                <link rel=\"stylesheet\" href=\"../layout.css\">
                                   <div id=\"Menuphoto\">
                                <?php echo \"<img src=\".\$image.\" class='sixtyphoto' >\";
                                ?> </div>
                               <?php
                	        } // End of the IF.
                        } // End of extension check.
                    } // End of the foreach loop.
                    \$link_name = \$_SESSION['link_name'];
                    \$dir = \"../\$link_name\"; // Define the directory to view.
                    \$files = scandir(\$dir); // Read all the videos into an array.
                
                    // Display each video
                
                    foreach (\$files as \$video) 
                    {
                        \$ext = strtolower(substr(\$video, -4));
                        if((\$ext=='.mp4') OR (\$ext=='.avi') OR (\$ext=='.mov') OR (\$ext=='.3gp') OR (\$ext=='.mpeg') OR (\$ext=='.m3u8') OR (\$ext=='.ts') OR (\$ext=='.flv') OR (\$ext=='.wmv') OR (\$ext=='.MP4') OR (\$ext=='.AVI') OR (\$ext=='.MOV') OR (\$ext=='.3GP') OR (\$ext=='.MPEG') OR (\$ext=='.M3U8') OR (\$ext=='.TS') OR (\$ext=='.FLV') OR (\$ext=='.WMV'))
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
                    
                   if (\$_SESSION['edit_access']!=\$tree_name)
                   { 
                        \$_SESSION = []; // Destroy the variables.
        	            session_destroy(); // Destroy the session itself.
        	            setcookie(session_name(), '', time()-3600); // Destroy the cookie.
        	            \$url = BASE_URL . ''; // Define the URL.
    	                ob_end_clean(); // Delete the buffer.
	                    header(\"Location: \$url\");
	                    exit(); // Quit the script.
                   }
                   else
                   {
                       echo \"\";
                   }
                    
                        if (isset(\$_SESSION['user_level']))
                        {
                            include('../footerloggedinsearch.html');
                        } else {
                            include('../footerlog.html');
                        }
                } // End of logged-in status check.
               // FUNCTION TIME 
                
                        function curPageURLrepeat() 
                        {
                            \$pageURLrepeat = 'http';
                            if (\$_SERVER[\"HTTPS\"] == \"on\") 
                            {
                                \$pageURLrepeat .= \"s\";
                            }
                            \$pageURLrepeat .= \"://\";
                            if (\$_SERVER[\"SERVER_PORT\"] != \"80\") 
                            {
                                \$pageURLrepeat .= \$_SERVER[\"SERVER_NAME\"].\":\".\$_SERVER[\"SERVER_PORT\"].\$_SERVER[\"REQUEST_URI\"];
                            }
                            else
                            {
                                \$pageURLrepeat .= \$_SERVER[\"SERVER_NAME\"].\$_SERVER[\"REQUEST_URI\"];
                            }
                            return \$pageURLrepeat;
                        }
                        \$funrepeat = curPageURLrepeat();
                        \$funrepeat = substr_replace(\$funrepeat ,\"\", -1);
                        \$tree_namerepeat= basename(\$funrepeat);
                        //END FUNCTION TIME
               
               //insert video
                   if (isset(\$_SESSION['user_level']))
                {
                    if (\$_SESSION['user_level']!=\$tree_name)
                   { 
                        \$_SESSION = []; // Destroy the variables.
        	            session_destroy(); // Destroy the session itself.
        	            setcookie(session_name(), '', time()-3600); // Destroy the cookie.
        	            \$url = BASE_URL . ''; // Define the URL.
    	                ob_end_clean(); // Delete the buffer.
	                    header(\"Location: \$url\");
	                    exit(); // Quit the script.
                   }
                   else
                   {
                       echo \"\";
                   }
                    \$dir = \"../\$tree_namerepeat\"; // Define the directory to view.
                    \$files = scandir(\$dir); // Read all the images into an array.
                
                        // Display each image caption as a link to the JavaScript function:
                        foreach (\$files as \$image) 
                        {
                            \$ext = strtolower(substr(\$image, -4));
                            if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png') OR (\$ext=='.tif') OR (\$ext=='.eps') OR (\$ext=='.TIF') OR (\$ext=='.EPS') OR (\$ext=='.JPG') OR (\$ext=='JPEG') OR (\$ext=='.PNG'))
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
                    		         \$imageshow = \"photo/\". \$image;
                		        // Print the information:
                		        ?>	
                                <link rel=\"stylesheet\" href=\"../layout.css\">
                                   <div id=\"Menuphoto\">
                                <?php echo \"<img src=\".\$image.\" class='sixtyphoto' >\";
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
                    include('../footerpublic.html');
                } // End of key-entered-in status check.
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
            
            //make folder for photo upload
            
            $dirphoto = $_SESSION['link_name'];
            $dirphoto .= '/photo';
            $file_to_writephoto = 'index.php';
            $content_to_writephoto =  "<h1>hello world</h1>";
            if(is_dir($dirphoto) === false )
            {
                mkdir($dirphoto);
            }
            
            $filephoto = fopen($dirphoto . '/' . $file_to_writephoto,"w");
            fwrite($filephoto, $content_to_writephoto);
            fclose($filephoto);
            
            //make folder for video upload
            $dirvideo = $_SESSION['link_name'];
            $dirvideo .= '/video';
            $file_to_writevideo = 'index.php';
            $content_to_writevideo =  "<h1>hello world</h1>";
            if(is_dir($dirvideo) === false )
            {
                mkdir($dirvideo);
            }
            
            $filevideo = fopen($dirvideo . '/' . $file_to_writevideo,"w");
            fwrite($filevideo, $content_to_writevideo);
            fclose($filevideo);
            
            //make file for deletecoverphoto button
            
            $dir2 = $_SESSION['link_name'];
            $file_to_write2 = 'deletecoverphoto.php';
            
            $content_to_write2 = "<?php
                \$files = glob('*'); // Read all the videos into an array.
                
                foreach (\$files as \$image)
                {
                \$ext = strtolower(substr(\$image, -4));
                if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png') OR (\$ext=='.tif') OR (\$ext=='.eps') OR (\$ext=='.TIF') OR (\$ext=='.EPS') OR (\$ext=='.JPG') OR (\$ext=='JPEG') OR (\$ext=='.PNG'))
                {
                unlink(\$image);
                }
                }
                echo 'Cover Photo deleted. I bet the next one rocks';
                ?>
                <html>
                <a href=\"covervideo.com/<?php echo \"{\$_SESSION['link_name']}\";?>/index.php\">Back to my covervideo</a>
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
                <a href=\"<?php echo \"{\$_SESSION['link_name']}\";?>/index.php\">Back to my covervideo</a>
                <?php header(\"location:../cvupload.php\"); ?>
                </html>
                "
                ;
            //If the existence of a directory is not true (directory does not exist under variable name $dir) then make the directory
            mkdir($dir3);
            
            $file3 = fopen($dir3. '/' . $file_to_write3, "w");
            fwrite($file3, $content_to_write3);
            fclose($file3);
            
            $dir5 = $_SESSION['link_name'];
            $file_to_write5 = 'deletecovervideoandphoto.php';
            
            $content_to_write5 = "<?php
                \$files = glob('*'); // Read all the videos into an array.
                
                foreach (\$files as \$image)
                {
                \$ext = strtolower(substr(\$image, -4));
                if((\$ext=='.jpg') OR (\$ext=='jpeg') OR (\$ext=='.png') OR (\$ext=='.tif') OR (\$ext=='.eps') OR (\$ext=='.TIF') OR (\$ext=='.EPS') OR (\$ext=='.JPG') OR (\$ext=='JPEG') OR (\$ext=='.PNG'))
                {
                unlink(\$image);
                }
                }
                foreach (\$files as \$image)
                {
                \$ext = strtolower(substr(\$image, -4));
                if((\$ext=='.mp4') OR (\$ext=='.avi') OR (\$ext=='.mov') OR (\$ext=='.3gp') OR (\$ext=='.mpeg') OR (\$ext=='.m3u8') OR (\$ext=='.ts') OR (\$ext=='.flv') OR (\$ext=='.wmv') OR (\$ext=='.MP4') OR (\$ext=='.AVI') OR (\$ext=='.MOV') OR (\$ext=='.3GP') OR (\$ext=='.MPEG') OR (\$ext=='.M3U8') OR (\$ext=='.TS') OR (\$ext=='.FLV') OR (\$ext=='.WMV'))
                {
                unlink(\$image);
                }
                }
                echo 'Cover Video and deleted. I bet the next one rocks';
                ?>
                <html>
                <a href=\"covervideo.com/<?php echo \"{\$_SESSION['link_name']}\";?>/index.php\">Back to my covervideo</a>
                <?php header('Location: ' . \$_SERVER['HTTP_REFERER']); ?>
                </html>
                "
                ;
            //If the existence of a directory is not true (directory does not exist under variable name $dir) then make the directory
            mkdir($dir5);
            
            $file5 = fopen($dir5. '/' . $file_to_write5, "w");
            fwrite($file5, $content_to_write5);
            fclose($file5);
            
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
				echo '<p class="error">Sorry, ID and Password are not a match.</p>';
			}
		}
		else
		{ // No match was made.
			echo '<p class="error">Sorry, ID and Password are not a match.</p>';
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
<form action="login.php" id="logincenter" method="post">
	    <style>
	    #logincenter
	    {
        top: 50%;
        position: absolute;
         margin-top: -25%;
         }
        input[type=treeid]{
            height:100px;
            width:72%;
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
            height:100px;
            width:72%;
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
            width:72%;
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
        .noclick {
            width:56%;
            cursor: default;
            color: white;
            background-color: forestgreen;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-left-radius: 3.33px 2.33px;
            border-top-right-radius: 10px 25px;
            border-bottom-left-radius: 11.67px 10px;
            border-bottom-right-radius: 11.67px 1px;
        }
        button[type=button]
        {
        display: inline;
        height:138px;
        width:72%;
        font-size:30px;
        }
        button[type=button]:hover::after
        {
            border:5px solid #ffffff;
            box-shadow: 3px 3px 3px #ffffff;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            content: "✓";
            color:#ffffff;
            background-color: #14401c;
        }
</style>
<script>
function treeidentity(){
document.getElementById('box0').placeholder = "ID";
}
function treeidentityreturn(){
  document.getElementById('box0').placeholder = "ID";
}
function passworded(){
document.getElementById('box00').placeholder = "Password";
}
function passwordedreturn(){
document.getElementById('box00').placeholder = "Password";
}
function showit() {
     var x = document.getElementById("box00");
    setTimeout(function(){x.type = "treeid";}, 00);
    setTimeout(function(){x.type = "password";}, 3000);
}
</script><br><br><br><br><br><br><br><br><br><br><br>
	    <p><input type="treeid" placeholder="Channel ID" autocapitalize="none" onfocus="treeidentity()" onblur="treeidentityreturn()" id="box0" placeholder="&#xf1ce;" style="font-family:FontAwesome;" name="link_name" size="32" maxlength="60" autofocus="autofocus">&nbsp;</p>
	    <p><input type="password" autocapitalize="none" onfocus="passworded()" onblur="passwordedreturn()" autocomplete="new-password" id="box00" placeholder="Password (NOT Key)" name="pass" size="32"><br><br><button type="button" class="noclick" tabindex="-1" onclick="showit()" onmouseover="showit()">&nbsp;<i class="fa fa-eye fa-rotate-180"></i><i class="fa fa-eye fa-rotate-180"></i> Pass</button></p>
	    <br><br><input type="submit" name="submit" value="Login"></div>
</form>
</div>
<style>
#bigmessage{
font-size:50px;
    }
.verifyhover:hover {
    font-family: lucida calligraphy, cursive;
    color: #ffffff;
    border-top-left-radius:12px 36px;
    border-bottom-right-radius:40px 40px;
    border-bottom-left-radius:51px 72px;
    border-top-right-radius:151px 72px;
    background-color:#87ceeb;
    border: 2px solid 	#338cb0;
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
 #special
 {
    font-size:2px;
    color:white;
}
</style>
<h1 id="special"> cover video covervideo</h1>
<?php include('footerkeylogin.html');?>