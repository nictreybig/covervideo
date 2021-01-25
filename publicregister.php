<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head></html>
<?php # Script 18.6 - register.php
// This is the registration page for the site.
require('config.inc.php');
include('headerregister.html');
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ // Handle the form.

	// Need the database connection:
	require(MYSQL);

	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	// Assume invalid values:
	$p = $name = FALSE;

    // Check for a password and match against the confirmed password:

	if (strlen($trimmed['password1']) >= 10) 
	{
		if ($trimmed['password1'] == $trimmed['password2']) 
		{
			$p = password_hash($trimmed['password1'], PASSWORD_DEFAULT);
		}
		else
		{
			echo '<p class="error">Your password did not match the confirmed password.</p>';
		}
	}
	else
	{
		echo '<p class="error">Please enter a valid password over 10 characters long.</p>';
	}
	
	// Check for link name entry
	
	if (preg_match('/^[A-Z \'-.ÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜŸäëïöüÿÆæÇç¿¡ŒœßºªØøÅåÞþÐð«»‹›ŠšŽž¢£€¥ƒ¤÷°±µ1234567890 ]{1,40}$/i', $trimmed['link_name'])) 
	{
		$name = mysqli_real_escape_string($dbc, $trimmed['link_name']);
		$name = strtolower($name);
	} 
	else
	{
		echo '<p class="error">Sorry for not accepting your ID. Please try again...</p>';
	}
	
	// Validate the key:
	
	    if($p && $name)
	    {
	        $q = "SELECT user_id FROM users WHERE link_name='$name'";
		    $r = mysqli_query($dbc, $q);

		if (mysqli_num_rows($r) == 0) 
		{
			    // Add the user to the database:

		        $q = "INSERT INTO users (link_name, pass) VALUES ('$name', '$p')";
			    $r = mysqli_query($dbc, $q);

			    if (mysqli_affected_rows($dbc) == 1) 
			    {
				    echo '<h3>Tap the Space Shuttle to activate<br><br><u> covervideo.com/' . $name . '</u></h3>';
				    ?><br>&emsp;&emsp;&emsp;&emsp;<a href ="openlogin.php"><i class='fas fa-space-shuttle fa-rotate-270' id="emailhover" style="font-size:144px;"></i></a>
				    <?php
				        echo '<h3>Regards,</h3>';
				        echo '<h3>CoverVideo™</h3>';
				    ?>
				    <style> 
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
.emailhover:hover {
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

#selectcss
{
    background-color:green;
    color:green;
}
.emailhover:hover::after {
    font-family: lucida calligraphy, cursive;
    color: #00000;
    border-top-left-radius:12px 36px;
    border-bottom-right-radius:40px 40px;
    border-bottom-left-radius:51px 72px;
    border-top-right-radius:151px 72px;
    background-color:#e3d6ff;
    border: 2px solid 	purple;
    text-shadow: 1px 1px #d8dddf;
    padding-top: 30px;
    content: 'Initiating Launch Sequence';
}
.loginhover:hover {
    direction: rtl;
    font-family: lucida calligraphy, cursive;
    color: #ffffff;
    background-color:#87ceeb;
    border: 2px solid 	#338cb0;
    border-top-left-radius:12px 36px;
    border-top-right-radius:122px 72px;
    border-bottom-left-radius:18px 18px;
    border-bottom-right-radius:51px 72px;
    text-shadow: 1px 1px #d8dddf;
    padding-left: 30px;
    padding-right: 30px;
}
.loginhover:hover::after {
    direction: rtl;
    font-family: lucida calligraphy, cursive;
    color: #ffffff;
    background-color:#e3d6ff;
    border: 2px solid 	purple;
    border-top-right-radius:12px 36px;
    border-top-left-radius:122px 72px;
    border-bottom-left-radius:18px 18px;
    border-bottom-right-radius:51px 72px;
    text-shadow: 1px 1px #d8dddf;
    padding-top: 30px;
    content: 'Click link in email then login';
}
.loginhoverstill:hover {
    direction: rtl;
    font-family: lucida calligraphy, cursive;
    color: #ffffff;
    background-color:#87ceeb;
    border: 2px solid 	#338cb0;
    border-top-left-radius:12px 36px;
    border-top-right-radius:122px 72px;
    border-bottom-left-radius:18px 18px;
    border-bottom-right-radius:51px 72px;
    text-shadow: 1px 1px #d8dddf;
    padding-left: 30px;
    padding-right: 30px;
}
.loginhoverstill:hover::after {
    direction: rtl;
    font-family: lucida calligraphy, cursive;
    color: #ffffff;
    background-color:#e3d6ff;
    border: 2px solid 	purple;
    border-top-right-radius:12px 36px;
    border-top-left-radius:122px 72px;
    border-bottom-left-radius:18px 18px;
    border-bottom-right-radius:51px 72px;
    text-shadow: 1px 1px #d8dddf;
    padding-top: 30px;
    content: '  Click to activate your CoverVideo™  ';
}
</style><?php
				    include('footerregisternoleaf.html'); // Include the HTML footer.
				    mysqli_close($dbc);
				    exit(); // Stop the page.
				?>
				<?php
                }
			    else
			    { // If it did not run OK.
				    echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
		    	}
		}
		 else
	    { // ID taken.
				echo '<p class="error">ID taken.</p>';
		} 	
	}
	else
	{ // If it did not run OK.
				echo '<p class="error">Not okay.</p>';
	}
mysqli_close($dbc);
} // End of the main Submit conditional.
?>
<script>
function sayHi(){
    var name = covervideo.com;
    document.getElementById("username").innerHTML = name;
}
function sayName(){
    var name = covervideo.com;
    document.getElementById("firstname").innerHTML = name;
}

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
function treeid(){
  document.getElementById('box1').placeholder = "";
}
function treeidreturn(){
  document.getElementById('box1').style.left = "824px";
  document.getElementById('box1').placeholder = "Login ID";
  document.getElementById('box1').type = "textgone";
}
function emailed(){
document.getElementById('box4').placeholder = "Verification Email (Safety)";
}
function emailedreturn(){
document.getElementById('box4').placeholder = "Email or Phone Number";
}
function password(){
document.getElementById('box3').placeholder = "10+ Characters";
}
function passwordreturn(){
document.getElementById('box3').placeholder = "Login Password";
}
</script>
<div id="Content">
<form action="openregister.php" method="post">
<style>
        input{display: inline;}
        h1 {	-webkit-appearance: none;  -moz-appearance: none; appearance: none;
                display: inline; 
                height:50px;
                width: 40%;
                font-size:44px;}
        h2 {-webkit-appearance: none;  -moz-appearance: none; appearance: none;    
            display: inline; height:50px;
                width: 40%;
                font-size:22px;}
        span {  display: inline;}
        #whiteoutgreenpeace {
        animation-duration: 60s; // or something else
}
#earthcenter
{
    color: #04aed9;
    position:absolute;
    top:425px;
	left:30px;
	z-index:-2;
}
#notchspin
{
    position:absolute;
    top:420px;
	left:26px;
	z-index:4;
}
    </style>
    <head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head><br><br>
    <h1><b>&nbsp;<i class='fas fa-circle-notch fa-rotate-90' title='Auto Search' id='whiteoutgreenpeace' style='font-size:48px;'></i>reate Public</b> <br><br>&nbsp;covervideo.com/<span id="username"></span> </h1><br><br>
    &nbsp;<input type="texttreeid" autocapitalize="none" name="link_name" spellcheck="false" placeholder="ID" style="font-family:FontAwesome;" id="box1" onfocus="treeid()" onblur="treeidreturn()" size="40" maxlength="60" value="<?php if (isset($trimmed['link_name'])) echo $trimmed['link_name'];?>" oninput="sayHi();" autofocus="autofocus">&nbsp;&nbsp; </div><br>&nbsp;&nbsp; <button type="button" class="noclick" type="one" tabindex="-1" style="width: 50%; font-family:FontAwesome; background-color:#1E6C89;border:6px solid #74e2f3; box-shadow:1px 1px #1E6C89;"onclick="copyToClipboard('#username')" onmouseover="copyToClipboard('#username')">Tap Here to Copy Login ID</button><br><br><h2>&nbsp;&nbsp; <i class='fas fa-circle-notch fa-rotate-90' title='Auto Search' id='whiteoutgreenpeace' style='font-size:34px;'></i>reate Login Password <br>&nbsp;&nbsp; (10+ Characters Long)</h2><br><br>&nbsp;&nbsp; <input type="password" id ="box3" placeholder="Login Password"name="password1" autocapitalize="none" autocomplete="new-password" size="43" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>"><br><br>&nbsp;&nbsp; <button type="button" id="viewpassword" class="noclick" tabindex="-1" onclick="showit()" onmouseover="showit()"><i class="fa fa-eye fa-rotate-180"></i><i class="fa fa-eye fa-rotate-180"></i> Password</button> <br><br>&nbsp;&nbsp; <input type="password" placeholder="Confirm Password" autocapitalize="none" id="box4" name="password2" autocomplete="new-password" size="20" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>">
	  <br><br>
    <script>
        var counter = 0;
        var interval = setInterval(function() {
        counter++;
        // Display 'counter' wherever you want to display it.
        if (counter == 5) {
        // Display a login box
        clearInterval(interval);
    }
}, 1000);
    </script>
<style>
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
	-webkit-appearance: none;  
    -moz-appearance: none; 
    appearance: none;
}

input[type="password"]
{
    height:60px;
    width:50%;
    font-size:20px;
    -webkit-appearance: none;  -moz-appearance: none; appearance: none;
	line-height: 30px;
}

input[type="password"]:focus
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
    line-height: 30px;
}
input[type=password]:focus::placeholder
{
    -webkit-appearance: none;  -moz-appearance: none; appearance: none;
    color:#000000;
}
input[type="submit"]
{
    height:175px;
    width: 50%;
    font-size:40px;
    -webkit-appearance: none;  -moz-appearance: none; appearance: none;
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    cursor:grab;
    color: #ffffff;
    padding: 12px;
    background-color: #26bf4e;
    border: 5px solid #006633;
    border-top-right-radius: 2px 11.67px;
    border-top-left-radius: 10px 25px;
    border-bottom-right-radius: 11.67px 10px;
    border-bottom-left-radius: 11.67px 1px;
}
input[type="submit"]:focus
{
    -webkit-appearance: none;  -moz-appearance: none; appearance: none;
    cursor:grabbing;
    color: #ffffff;
    padding: 15px;
    background-color: #457d27;
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
button[type=button]
{
    border-top-left-radius: 3.33px 2.33px;
    border-top-right-radius: 10px 25px;
    height:70px;
    width: 170px;
    font-size:22px;
}
#viewpassword { 
  width: 50%;
}
#peekkeyoutline {
    width: 50%;
    border-top-right-radius: 3.33px 2.33px;
    border-top-left-radius: 10px 25px;
    border-bottom-right-radius: 11.67px 10px;
    border-bottom-left-radius: 11.67px 1px;
}
button[type=button]:hover::after
{
    border:5px solid #ffffff;
    box-shadow: 3px 3px 3px #ffffff;
    border-top-right-radius: 3.33px 2.33px;
    border-top-left-radius: 10px 25px;
    border-bottom-right-radius: 11.67px 10px;
    border-bottom-left-radius: 11.67px 1px;
    direction: rtl;
    content: "✓";
    color:#ffffff;
    background-color: #14401c;
}
button[id=peekkeyoutline]:hover::after
{
    border:5px solid #ffffff;
    box-shadow: 3px 3px 3px #ffffff;
    border-top-right-radius: 3.33px 2.33px;
    border-top-left-radius: 10px 25px;
    border-bottom-right-radius: 11.67px 10px;
    border-bottom-left-radius: 11.67px 1px;
    direction: rtl;
    color:#ffffff;
    background-color: #14401c;
}
button[id=peekkeyoutline]:hover
{
    border:5px solid #ffffff;
    box-shadow: 3px 3px 3px #ffffff;
    border-top-right-radius: 3.33px 2.33px;
    border-top-left-radius: 10px 25px;
    border-bottom-right-radius: 11.67px 10px;
    border-bottom-left-radius: 11.67px 1px;
    direction: rtl;
    color:#ffffff;
    background-color: #14401c;
}
button[type=button]:hover
{
    border:5px solid #ffffff;
    box-shadow: 3px 3px 3px #ffffff;
    color:#ffffff;
    background-color: #14401c;
}
         input[type=textfirstname]:focus{
             text-align: none;
            -webkit-appearance: none;  
            -moz-appearance: none; 
            appearance: none;
            background: #aff069;
            border:7px solid #03611c;
            box-shadow: 5px 5px 5px #14401c;
        }
        input[type=textgone]{
            border: white;
            color: white;
            cursor:white;
            caret-color: white;
        }
        input[type=textfirstname]{
            text-align: center;
            height:60px;
            width: 30%;
            line-height: 30px;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: lucida calligraphy, cursive;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            outline-width: 0;
        }
        input[type=textfirstname]:focus::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#000000;
        }
        input[type=textfirstname]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: center;
        }
        input[type=textfirstname]::-ms-input-placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            text-align: center;
        } 
        input[type=email]{
            line-height: 30px;
            height:60px;
            width: 50%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#000000;
            border:3px solid #03611c;
            box-shadow: 1px 0.67px 0.67px #219136;
            outline-width: 0;
        }
        input[type=email]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#ffffff;
            background:#499b4a;
            border:9px solid #03611c;
            box-shadow: 3px 2px 2px #219136;
        }
        input[type=email]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: center;
        }
        input[type=email]:focus::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#ffffff;
        }
         input[type=password]{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            height:60px;
            line-height:40px;
            width: 50%;
            border:3px solid #03611c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
        }
        input[type=password]::placeholder{
        text-align: center;
        }
        input[type=passwordemail]::placeholder{
        text-align: center;
        }
        input[type=password]:focus{
            -webkit-text-security: disc;
            color: #000000;
            background:#7cdc69;
            border:7px solid #03611c;
            box-shadow: 5px 5px 5px #14401c;
            line-height: 60px;
            letter-spacing: 1px;
        }
        input[type=passwordshow]{
             font-size:20px;
            -webkit-text-security: none;
            color:#03611c;
            font-size:;
            height:60px;
            width: 50%;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-left-radius: 3.33px 2.33px;
            border-top-right-radius: 10px 25px;
            border-bottom-left-radius: 11.67px 10px;
            border-bottom-right-radius: 11.67px 1px;
            outline-width: 0;
            
        }
        input[type=passwordshow]:focus{
            -webkit-text-security: none;
            color:#03611c;
            height:60px;
            line-height:40px;
            width: 50%;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
            
        }
        input[type=passwordemailshow]{
            -webkit-text-security: none;
            line-height: 30px;
            height:60px;
            width: 50%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 1px 1px 1px #14401c;
            outline-width: 0;
            text-align: left;
        }
        input[type=passwordemailshow]:blur{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            text-align: left;
            color:black;
        }
        input[type=passwordemailshow]:focus{
            transition-duration: 5s;
            -webkit-text-security: none;
            line-height: 30px;
            background:white;
            height:60px;
            width: 50%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 1px 1px 1px #14401c;
            outline-width: 0;
        }
        input[type=password]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color: #ffffff;
            background:#499b4a;
            border:9px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
        }
          input[type=password]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
        }
         input[type=password]:focus::placeholder{
             -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#ffffff;
        }
        input[type=texttreeid]:blur{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            text-align: center;
        }
         input[type=texttreeid]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
        }
        input[type=texttreeid]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            text-align: center;
            background-color:#74E2F3;
            border:7px solid #1E6C89;
            box-shadow: 5px 5px 5px #1E6C89;
            border-top-left-radius: 3.33px 2.33px;
            border-top-right-radius: 10px 25px;
            border-bottom-left-radius: 11.67px 10px;
            border-bottom-right-radius: 11.67px 1px;
            line-height: 60px;
            letter-spacing: 1px;
        }
        input[type=texttreeid]{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            text-align: center;
            font-size:20px;
            color: black;
            height:60px;
            line-height:40px;
            width: 50%;
            border:3px solid #1E6C89;
            box-shadow: 3px 3px 3px #1E6C89;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
        	line-height: 30px;
        	background-color:#74E2F3;
        }
        input[type=texttreeid]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:black;
            text-align: center;
        }
        input[type=texttreeid]:focus::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#000000;
        }
        input[type=pronoun]:blur{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            text-align: center;
        }
         input[type=pronoun]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
        }
        input[type=pronoun]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color: #000000;
            background:#7cdc69;
            border:7px solid #03611c;
            box-shadow: 5px 5px 5px #14401c;
            border-top-left-radius: 3.33px 2.33px;
            border-top-right-radius: 10px 25px;
            border-bottom-left-radius: 11.67px 10px;
            border-bottom-right-radius: 11.67px 1px;
            line-height: 60px;
            letter-spacing: 1px;
        }
        input[type=pronoun]{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-size:20px;
            color: black;
            height:60px;
            line-height:40px;
            width: 19%;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
        	line-height: 30px;
        }
        input[type=pronoun]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:black;
            text-align: center;
        }
        input[type=pronoun]:focus::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#000000;
        }
        input[type=passwordemail]{
           -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            -webkit-text-security: disc;
            text-align: center;
            font-size:20px;
            color:black;
            height:60px;
            line-height:40px;
            width: 50%;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
        	line-height: 30px;
        }
            input[type=passwordemail]:focus{
            -webkit-text-security: disc;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            background:#7cdc69;
            font-size:20px;
            color:black;
            height:60px;
            line-height:40px;
            width: 50%;
            text-align: left;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
        }
        input[type=passwordemail]:focus::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            text-align: center;
            color:black;
        }
         .clear{
            width:1%;
            color: white;
            background-color: white;
        }
        .noclick {
            width:50%;
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
        body 
        {
            -webkit-appearance: none;
            background-color: white;
        }
        h2 {
        width:50%;
        }
        #special{
        font-size:2px;
        color:white;
        }
</style>
</p>
<!-- An element to toggle between password visibility -->
</p>
<script>
    $('form input').on('keypress', function(e) {
    return e.which !== 13;
});
</script>
&nbsp;&nbsp; <input type="submit" name="submit" value= "Register"></i>
</form>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 
<script>

function showpassFunction() {
  var x = document.getElementById("box3");
  if (x.type = "passwordemail") {
    x.type = "passwordemailshow";
  } else {
    x.type = "passwordemail";
  }
}

function showit() {
     var x = document.getElementById("box3");
    setTimeout(function(){x.type = "passwordshow";}, 0000);
    setTimeout(function(){x.type = "password";}, 3000);
}
function unshowit(){
    var x = document.getElementById("box3");
    x.type = "passwordemail";}
    function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById(myCheck);
    // Get the output text
    var text = document.getElementById("text");
    var x = document.getElementById("box3");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
    x.type = "passwordemailshow";
    
    } else {
    text.style.display = "none";
  }
}

function showcvkey() {
  var x = document.getElementById("box2");
  if (x.type = "password") {
    setTimeout(function(){x.type = "passwordshow";}, 000);
    setTimeout(function(){x.type = "passwordemail";}, 3000);
  }
  else
  {
    x.type = "password";
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</div>
<h1 id="special"> cover video covervideo</h1>
<?php include('footerregister.html'); 
?>
