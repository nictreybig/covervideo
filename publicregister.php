<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>
<link rel="icon" href="atlogo.png" type="image/png">
<!-- default favicon -->
<link rel="shortcut icon" href="atlogo.png" type="image/png">
<!-- wideley used favicon -->
<link rel="icon" href="at32.png" sizes="32x32" type="image/png">
<!-- for apple mobile devices -->
<link rel="apple-touch-icon-precomposed" href="at120.png" type="image/png" sizes="120x120">
<link rel="apple-touch-icon-precomposed" href="at152.png" type="image/png" sizes="152x152">
<!-- google tv favicon -->
<link rel="icon" href="at96.png" sizes="96x96" type="image/jpg"></head></html>
</head>
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
	$fn = $ln = $e = $p = $edu = $we = $name = FALSE;

	// Check for a first name:XÆA-12
	if (preg_match('/^[A-Z \'-.ÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜŸäëïöüÿÆæÇç¿¡ŒœßºªØøÅåÞþÐð«»‹›ŠšŽž¢£€¥ƒ¤÷°¬±µ1234567890镕ėēę× ]{2,20}$/i', $trimmed['first_name']))
	{
		$fn = mysqli_real_escape_string($dbc, $trimmed['first_name']);
	}
	else
	{
		echo '<p class="error">That first name looks suspicious...</p>';
	}

	// Check for a last name:
	if (preg_match('/^[A-Z \'-.ÀÈÌÒÙàèìòùÁÉÍÓÚÝáéíóúýÂÊÎÔÛâêîôûÃÑÕãñõÄËÏÖÜŸäëïöüÿÆæÇç¿¡ŒœßºªØøÅåÞþÐð«»‹›ŠšŽž¢£€¥ƒ¤÷°¬±µ1234567890 ]{2,40}$/i', $trimmed['last_name']))
	{
		$ln = mysqli_real_escape_string($dbc, $trimmed['last_name']);
	}
	else
	{
		echo '<p class="error">That last name looks suspicious...</p>';
	}

	// Check for an email address:
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) 
	{
		$e = mysqli_real_escape_string($dbc, $trimmed['email']);
	}
	else
	{
		echo '<p class="error">That email address looks suspicious...</p>';
	}

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
		echo '<p class="error">Please enter a treeid!</p>';
	}

	if ($fn && $ln && $e && $p && $name) 
	{  // If everything's OK...
	
		// Make sure the email address is available:
	
		$q = "SELECT user_id FROM users5 WHERE email='$e'";
		$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

		if (mysqli_num_rows($r) == 0) 
		{ // Available.
		
	        //Link code uniqueness and availability check
	
		    $q = "SELECT user_id FROM users5 WHERE link_name='$name'";
		    $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));
            if (mysqli_num_rows($r) == 0)  
            {   // Available.

			    $r = mysqli_query($dbc, $q);
			    $num = mysqli_num_rows($r);

                // Create the activation code:
		
			    $a = md5(uniqid(rand(), true));

			    // Add the user to the database:
		
		        $q = "INSERT INTO users5 (email, pass, first_name, last_name, active, registration_date, link_name) VALUES ('$e', '$p', '$fn', '$ln', '$a', NOW(), '$name')";
			    $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

			    if (mysqli_affected_rows($dbc) == 1) 
			    {   // If it ran OK.
				
				    // Send the email:
				    $body = "Click to activate your applytree:\n\n";
				    $body .= BASE_URL . 'activatepublic.php?x=' . urlencode($e) . "&y=$a\n\n";
				    
				    $headers = 'From: '.$name.'@applytree.com' . "\r\n";
				    mail($trimmed['email'], $name , $body, $headers);
			?><script src='https://kit.fontawesome.com/a076d05399.js'></script><?php 
			echo'<br>';
				    // Finish the page:
				    $domain = substr($e, strpos($e, '@') + 1);
				    echo '<h1>'.$fn.',<br></h1>';
				    echo '<h3>Click mail below for '.$domain.':</h3>';
				    ?><a class="emailhover" target="_blank" href ="http://www.<?php echo$domain?>"><i class='fas fa-envelope'style="font-size:144px;"></i></a><?php
				    echo '<h3>Click the link in email sent to<br></h3>';
				    echo '<h3>'.$e.'<br></h3>';
				    echo '<h3>to activate applytree.<br><br></h3>';
				    ?><style> 
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
    content: 'Check email';
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
</style><?php
echo '<a class="loginhover" target="_blank" href="https://applytree.com/login.php" title="Login"><i class="fas fa-sync-alt" style="font-size:144px;"></i></a>';
				    echo'<h3>Login as '.$name.'. </h3>';
				    include('footerregister.html'); // Include the HTML footer.
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
	        { // If one of the data tests failed.
		        echo '<p class="error">treeid taken -_- </p>';
	        }
	        
	        mysqli_close($dbc);
	    }
	    else
	    { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
		}

	}
	else 
	{ // The link name is not available.
		echo '<p class="error">Sorry, System error</p>';
	}

} // End of the main Submit conditional.
?>
<script>
function sayHi(){
    var name = applytree.com;
    document.getElementById("username").innerHTML = name;
}
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();

  var x = document.getElementById("box2");
  if (x.type = "password") {
    setTimeout(function(){x.type = "passwordshow";}, 0000);
    setTimeout(function(){x.type = "password";}, 3000);
  }
  else
  {
    x.type = "password";
  }

}
function treeid(){
  document.getElementById('box1').placeholder = "lowercasenospaces login id";
}
function treeidreturn(){
  document.getElementById('box1').placeholder = "ID";
}
function treekey(){
document.getElementById('box2').placeholder = "Share this key with employers";
}
function treekeyreturn(){
document.getElementById('box2').placeholder = "TreeKey";
}
function emailed(){
document.getElementById('box4').placeholder = "Verification Email (not login id)";
}
function emailedreturn(){
document.getElementById('box4').placeholder = "Email";
}
function password(){
document.getElementById('box3').placeholder = "10+ Characters";
}
function passwordreturn(){
document.getElementById('box3').placeholder = "Login Password";
}
</script>
<div id="Cursive"><h2>&nbsp;&nbsp;Applytree Public Link Registration (Job Post or Applicant Profile):</h2>
<div id="Content">
<form action="registerpublic.php" method="post">
<input type="textfirstname" autofocus="autofocus" spellcheck="false" placeholder="First Name" name="first_name" maxlength="40" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>"> <br><br> <input type="textlastname" spellcheck="false" placeholder="Last Name" name="last_name" size="20" maxlength="60" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>"><br><br><br><br><br><br><br><style>
        h1 {display: inline; height:50px;
            width: 40%;
            font-size:44px;}
        h2 {display: inline; height:50px;
            width: 40%;
            font-size:22px;}
    </style>
    &nbsp;&nbsp;New Link:
    <div id="Cursive"><h2>&nbsp;applytree.com/</h2><h1><span id="username"></span></h1></div><br><br><input type="texttreeid" autocapitalize="none" name="link_name" spellcheck="false" placeholder="ID" id="box1" onfocus="treeid()" onblur="treeidreturn()" size="40" maxlength="60" value="<?php if (isset($trimmed['link_name'])) echo $trimmed['link_name'];?>" oninput="sayHi();"><br><br><button type="button" class="noclick" type="one" tabindex="-1" onclick="copyToClipboard('#username')" onmouseover="copyToClipboard('applytree.com/#username')">Hover or click here to copy ID</button><br>
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
    height:50px;
    width:50%;
    font-size:20px;
    -webkit-appearance: none;  -moz-appearance: none; appearance: none;
	font-family: "fontello";
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
	line-height: 30px;
	text-shadow: 1px 1px 1px rgba(11, 156, 50, 0.3);
	letter-spacing: 1px;
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
 height:50px;
    width: 50%;
    font-size:20px;
}
button[type=button]:hover::after
{
    border:5px solid #03611c;
    box-shadow: 3px 3px 3px #14401c;
    border-top-right-radius: 3.33px 2.33px;
    border-top-left-radius: 10px 25px;
    border-bottom-right-radius: 11.67px 10px;
    border-bottom-left-radius: 11.67px 1px;
    content: "✓";
    color:#ffffff;
    background-color: #14401c;
}
input[type=passwordshow]{
             font-size:20px;
            -webkit-text-security: none;
            color:#03611c;
            font-size:;
            height:60px;
            width: 30%;
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
            width: 30%;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
}        
input[type=passwordemailshow]
{
            -webkit-text-security: none;
            line-height: 30px;
            height:60px;
            width: 40%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 1px 1px 1px #14401c;
            outline-width: 0;
            
}
input[type=passwordemailshow]:focus
{
            transition-duration: 5s;
            -webkit-text-security: none;
            line-height: 30px;
            background:white;
            height:60px;
            width: 40%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 1px 1px 1px #14401c;
            outline-width: 0;
}
input[type=passwordshow]{
             font-size:20px;
            -webkit-text-security: none;
            color:#03611c;
            font-size:;
            height:60px;
            width: 30%;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-left-radius: 3.33px 2.33px;
            border-top-right-radius: 10px 25px;
            border-bottom-left-radius: 11.67px 10px;
            border-bottom-right-radius: 11.67px 1px;
            outline-width: 0;
            
}
input[type=passwordshow]:focus
{
            -webkit-text-security: none;
            color:#03611c;
            height:60px;
            line-height:40px;
            width: 30%;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            outline-width: 0;
            
        }
</style>
<script>
function showcvkey() {
  var x = document.getElementById("box2");
  if (x.type = "password") {
    setTimeout(function(){x.type = "passwordshow";}, 0000);
    setTimeout(function(){x.type = "passwordemail";}, 3000);
  }
  else
  {
    x.type = "password";
  }
}

function showit() {
     var x = document.getElementById("box3");
    setTimeout(function(){x.type = "passwordshow";}, 0000);
    setTimeout(function(){x.type = "password";}, 3000);
}
</script>
<br><br><br>
<style>
        input[type=text]{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 3px 1px 1px #14401c;
        }
        input[type=text]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
        }
         input[type=textfirstname]:focus{
            -webkit-appearance: none;  
            -moz-appearance: none; 
            appearance: none;
            background: #aff069;
            border:7px solid #03611c;
            box-shadow: 5px 5px 5px #14401c;
        }
        input[type=textfirstname]{
            text-align: center;
            height:50px;
            width: 50%;
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
         input[type=textlastname]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            background: #aff069;
            border:7px solid #03611c;
            box-shadow: 5px 5px 5px #14401c;
            outline-width: 0;
        }
        input[type=textlastname]{
            text-align: center;
            height:50px;
            width: 50%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: lucida calligraphy, cursive;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            line-height: 30px;
            outline-width: 0;
        }
         input[type=textlastname]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: center;
        }
         input[type=textlastname]:focus::placeholder{
             -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#000000;
        }
        input[type=email]{
            line-height: 30px;
            height:50px;
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
        input[type=passwordemail]{
            line-height: 30px;
            height:50px;
            width: 50%;
            font-size:20px;
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            border:3px solid #03611c;
            box-shadow: 1px 1px 1px #14401c;
            outline-width: 0;
        }
        input[type=passwordemail]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color: #ffffff;
            background:#499b4a;
            border:9px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
        }
          input[type=passwordemail]::placeholder{
              -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: center;
        }
         input[type=passwordemail]:focus::placeholder{
             -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#ffffff;
        }
        input[type=texttreeid]:focus{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color: #000000;
            background:#7cdc69;
            border:7px solid #03611c;
            box-shadow: 5px 5px 5px #14401c;
            border-top-left-radius: 3.33px 2.33px;
            border-top-right-radius: 10px 25px;
            border-bottom-left-radius: 11.67px 10px;
            border-bottom-right-radius: 11.67px 1px;
            line-height: 40px;
            letter-spacing: 1px;
        }
        input[type=texttreeid]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            letter-spacing: 1px;
        }
        input[type=texttreeid]{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            height:75px;
            width: 50%;
            font-size:20px;
            line-height:40px;
            color: #03611c;
            border:3px solid #03611c;
            box-shadow: 3px 3px 3px #14401c;
            border-top-right-radius: 3.33px 2.33px;
            border-top-left-radius: 10px 25px;
            border-bottom-right-radius: 11.67px 10px;
            border-bottom-left-radius: 11.67px 1px;
            text-shadow: 1px 1px 1px rgba(11, 156, 50, 0.3);
            letter-spacing: 1px;
            outline-width: 0;
            text-align: center;
            align: center;
        }
        input[type=texttreeid]:focus::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#000000;
            letter-spacing: 1px;
        }
        input[type=password]{
           -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            color:#03611c;
            height:75px;
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
        input[type=password]::placeholder{
            -webkit-appearance: none;  -moz-appearance: none; appearance: none;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: center;
        }
        .noclick {
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
</style>
</p><br><br><br><br><br>
	    <input type="email" onfocus="emailed()" onblur="emailedreturn()" id ="box4" placeholder="Email" name="email" size="43" maxlength="60" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>"><br><br>
	    <input type="passwordemail" onfocus="password()" onblur="passwordreturn()" id ="box3" placeholder="Login Password" style="-webkit-text-security: disc;" autocomplete="new-password" name="password1" size="20" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>"><br><br><input type="passwordemail" placeholder="Confirm Password" style="-webkit-text-security: disc;" autocomplete="new-password" name="password2" size="20" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>">
<br></p><br><br><br><br>
<input id="submitit" type="submit" name="submit" value= "Register"></i>
</form>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</div>
<?php include('footerregister.html'); ?>
