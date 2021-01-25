<?php
require('config.inc.php');
 # Script 18.1 - header.html
// This page begins the HTML header for the site.

// Start output buffering
ob_start();

// Initialize a session:
session_start();

// Display $page_title
$page_title = 'Covervideo';
$homepage = "Waterfun.jpg";
unset($_SESSION['user_level']);
require('mysqli_connect.php'); // Connect to the db.
?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="layouthome.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo 'Search' ?>
</title>
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
</head>
</html>
<body scroll="no" style="overflow: hidden">
<style>
i {
color: #228B22;
-webkit-transition-duration: 0.8s;
-moz-transition-duration: 0.8s;
-o-transition-duration: 0.8s;
transition-duration: 0.8s;

-webkit-transition-property: -webkit-transform;
-moz-transition-property: -moz-transform;
-o-transition-property: -o-transform;
transition-property: transform;

overflow:hidden;
}

i[type=newuser]:hover
{
-webkit-transform:rotate(360deg);
-moz-transform:rotate(360deg);
-o-transform:rotate(360deg);
}
i[type=login]:hover
{
-webkit-transform:rotate(-360deg);
-moz-transform:rotate(-360deg);
-o-transform:rotate(-360deg);
}
a:link {
    color:#ffffff;
    font-size:40px;
}
#MenuHomeHome {
    text-align: center;
    margin-left:-45px;
    -webkit-appearance: none;
	z-index: 4;
	position:absolute;
	top:532px;
	left:510px;
	width:350px;
	border:none;
    border-top-right-radius:250px 150px;
    border-top-left-radius:250px 150px;
    border-bottom-left-radius:5px 75px;
    /* Again, the ugly brilliant hack. */
	voice-family: "\"}\"";
	voice-family:inherit;
	}
#MenuHomeLogin {
    letter-spacing: 2px;
    font-family: lucida calligraphy;
    -webkit-appearance: none;
	z-index: 7;
	position:absolute;
	top:271px;
	left:790px;
	transform: rotate(-35deg);
	width:350px;
	border:0px solid #324a10;
	direction: rtl;
    border-top-right-radius:250px 150px;
    border-top-left-radius:250px 50px;
    border-bottom-left-radius:5px 75px;
    border-top-right-radius:16px 5px;
    /* Again, the ugly brilliant hack. */
	voice-family: "\"}\"";
	voice-family:inherit;
	}
#MenuHomeRegistrationsCount
{
    text-align: center;
    margin-left:-45px;
    -webkit-appearance: none;
	z-index: 4;
	position:absolute;
	top:557px;
	left:529px;
	width:350px;
	border:none;
    /* Again, the ugly brilliant hack. */
	voice-family: "\"}\"";
	voice-family:inherit;
}
#MenuHomeRegister {
    font-family: lucida calligraphy;
    letter-spacing: 2px;
    -webkit-appearance: none;
    z-index: 4;
	position:absolute;
	top:277px;
	left:162px;
	transform: rotate(35deg);
	width:350px;
	border:0px solid #324a10;
    border-top-left-radius:250px 150px;
    border-top-right-radius:250px 150px;
    border-bottom-right-radius:5px 75px;
    border-top-left-radius:5px 16px;
    /* Again, the ugly brilliant hack. */
	voice-family: "\"}\"";
	voice-family:inherit;
}
#MenuHReg {
    -webkit-appearance: none;
	font-family: lucida calligraphy;
	font-size:35px;
	z-index: 2;
	position:absolute;
	top:558px;
	left:416px;
	width:350px;
	border:0px solid #324a10;
    border-top-right-radius:250px 150px;
    border-top-left-radius:250px 150px;
    border-bottom-left-radius:5px 75px;
/* Again, the ugly brilliant hack. */
	voice-family: "\"}\"";
	voice-family:inherit;
}
body {
background-image: url('<?php echo $homepage;?>');
background-color: white;
background-repeat:no-repeat;
}
#notchspin
{
    text-align:center;
	z-index:-5;
	position:absolute;
	top:12px;
	left:88px;
}
#namefrontnotchspin
{
    position: absolute;
   	top:12px;
	left:90px;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
<!--i class="fa fa-fire flicker flicker-ver"></i-->
</span>
<div id="MenuHomeRegister">
<?php
echo '';
?>
</div>
<div id="MenuHomeLogin">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<a class="hover2" dir="rtl" href="https://covervideo.com/login.php" title="Login"></a><br><br>
</div>
<div id="MenuHomeHome">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require(MYSQL);

	// Validate the email address:
	if (!empty($_POST['treeidsearch']))
	{
	    $t = mysqli_real_escape_string($dbc, $_POST['treeidsearch']);
	    $url = '' . '' . $t . ''; // Define the URL.
        header("Location: $url");
        exit(); // Quit the script.
	}
	else
	{
	    $t = FALSE;
	    echo '<p class="error">You forgot to enter a TreeID!</p>';
	}
} // End of SUBMIT conditional.
?>
<form action="autosearch.php" method="post">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<input title="Search" type="treeidsearch" name="treeidsearch" class="yesplease" id="treeidsearch" onfocus="blackout();" onblur="whiteout();" placeholder=" &#xf002;" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" size="20" maxlength="50" style="margin-left: 5px; font-family:Arial, FontAwesome" autofocus><br />
&nbsp; &nbsp; &nbsp; &nbsp; <input type="submit">

</form><style>
input[type=treeidsearch]{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: transparent;
    border: 0px solid #000000;
    outline-width: 0;
    font-size: 200%;
    text-align: center;
    color: #000000;
    top:50px;
}
input[type=treeidsearch]:focus
{
    text-align:center;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    color: gold;
}
input[type=treeidsearch]:focus::placeholder
{
    text-align:center;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    color: black;
    text-shadow: none;
}
div.centermagnet
{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    text-align: center;
}
input[type=treeidsearch]
{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    z-index:-5;
    text-align: center
    color: transparent;
    text-shadow: 0 0 0 #000000;
    text-align: center;
}
input[type=treeidsearch]:focus
{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    color: #000000;
    text-shadow: 0 0 0 #000000;
    text-align: center;
}
input[type="submit"]{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    visibility: hidden;
}
input[type=treeidsearch]::placeholder
{
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    color:black;
    margin-left: 25px;
    transform: rotate(90deg);
}
select {
-webkit-appearance: none; 
-moz-appearance: none;
appearance: none;
}
#whiteoutgreenpeace
{color:skyblue;
}
</style>
scrollTo(2000,2000)
</script>
</div>
</body>
</html>
