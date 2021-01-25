<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <link rel="stylesheet" type="text/css" href="layouthome.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head></html>
<?php
require('config.inc.php');
include('header.html');
$homepage = "backhome.jpg";
unset($_SESSION['user_level']);
?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <title>Home</title>
<body overflow-x="hidden">
<style>
html, body {margin: 0; height: 100%; overflow: hidden}
#texas{
    position:absolute;
    top:140px;
    left:607px;
}
i {
color:white;
-webkit-transition-duration:0.8s;
-moz-transition-duration:0.8s;
-o-transition-duration:0.8s;
transition-duration:0.8s;

-webkit-transition-property:-webkit-transform;
-moz-transition-property:-moz-transform;
-o-transition-property:-o-transform;
transition-property:transform;

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
    text-align:center;
    margin-left:-45px;
    -webkit-appearance:none;
	z-index:4;
	position:absolute;
	top:562px;
	left:514px;
	width:350px;
	border:none;
    /* Again... an ugly perhaps brilliant Opera decision. */
	voice-family:"\"}\"";
	voice-family:inherit;
	}
#MenuHomeLogin {
    letter-spacing:2px;
    font-family:lucida calligraphy;
    -webkit-appearance:none;
	z-index:7;
	position:absolute;
	top:253px;
	left:790px;
	transform:rotate(-37.75deg);
	width:350px;
	border:0px solid #324a10;
	direction:rtl;
  /* Again... an ugly perhaps brilliant Opera decision. */
	voice-family:"\"}\"";
	voice-family:inherit;
	}
#MenuHomeRegister {
    font-family:lucida calligraphy;
    letter-spacing:2px;
    -webkit-appearance:none;
    z-index:4;
	position:absolute;
	top:254px;
	left:162px;
	transform:rotate(37.75deg);
	width:350px;
	border:0px solid #324a10;
    border-top-left-radius:250px 150px;
    border-top-right-radius:250px 150px;
    border-bottom-right-radius:5px 75px;
    border-top-left-radius:5px 16px;
  /* Again... an ugly perhaps brilliant Opera decision. */
	voice-family:"\"}\"";
	voice-family:inherit;
}
#MenuHomeQuestion {
    font-family:lucida calligraphy;
    letter-spacing:2px;
    -webkit-appearance:none;
    z-index:4;
	position:absolute;
	top:677px;
	left:628px;
	width:350px;
	border:0px solid #324a10;
    border-top-left-radius:250px 150px;
    border-top-right-radius:250px 150px;
    border-bottom-right-radius:5px 75px;
    border-top-left-radius:5px 16px;
  /* Again... an ugly perhaps brilliant Opera decision. */
	voice-family:"\"}\"";
	voice-family:inherit;
}
#MenuHReg {
    -webkit-appearance:none;
	font-family:lucida calligraphy;
	font-size:35px;
	z-index:2;
	position:absolute;
	top:558px;
	left:416px;
	width:350px;
	border:0px solid #324a10;
    border-top-right-radius:250px 150px;
    border-top-left-radius:250px 150px;
    border-bottom-left-radius:5px 75px;
/* Again... an ugly perhaps brilliant Opera decision. */
	voice-family:"\"}\"";
	voice-family:inherit;
}
body {
background-color:white;
background-repeat:no-repeat;
}
#notchspin
{
    color:#cdf5cb;
    position:absolute;
    top:470px;
	left:554px;
	z-index:4;
}
#namefront
{ 
    font-weight:bold;
    transform:rotate(34.75deg);
    position:absolute;
    top:-18px;
	left:-118px;
    z-index:78;
    color:#228B22;
    
}
#namefrontlightcolor
{ 
    color:white;
}
#whiteoutgreenpeace {
    animation-duration:69s; // or something else
}
</style>
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
<!--i class="fa fa-fire flicker flicker-ver"></i-->
</span>
<div id="MenuHomeQuestion">
<i type='newuser' style='color:green;font-size:84px;' id='earthgreen' class='fas fa-circle'></i>
</div>
<style>
#earthgreen
{
    color: forestgreen;
    position:absolute;
    top:-150px;
    left:-23px;
	z-index:-33;
}
#earthcentereuro
{
    color: #cdf5cb;
    position:absolute;
    top:-212px;
	left:-105px;
	z-index:33;
}
#earthcenterasia
{
    color: #cdf5cb;
    position:absolute;
    top:-212px;
	left:363px;
	z-index:-33;
}
#earthcenter
{
    color: #cdf5cb;
    position:absolute;
    top:-50px;
	left:134px;
	z-index:-30;
}
#namefrontlightcolor
{ 
    width:1000px;
    height:50px;
    font-style: Lucida calligraphy;
    font-size:30px;
    position:absolute;
    text-align:center;
    top:350px;
    left:150px;
    color:white;
}
#Searchit
{
    position:absolute;
    top:420px;
    left:550px;
}
</style>
<div id="Searchit">
<a href="https://covervideo.com/autosearch.php" title="New User" style="color:black;">Search CV</a></div>
<div id="MenuHomeHome">
                   <a href="autosearch.php"> <i class='fa fa-globe' id="earthcenter"style='font-size:110px; font-family:FontAwesome; color: #006994'></i></a>
                    <span class="iconify" style='font-size:96px; font-family:FontAwesome; color: #006994' id="earthcentereuro" data-icon="fa-solid:globe-europe" data-inline="false"></span>
                    <span class="iconify" style='font-size:96px; font-family:FontAwesome; color: #006994' id="earthcenterasia" data-icon="fa-solid:globe-asia" data-inline="false"></span>
<style>
input[type=treeidsearch]{
    background-color:transparent;
    border:0px solid #000000;
    outline-width:0;
    font-size:200%;
    position:absolute;
    left:-186px;
    top:-15px;
    color:#ffffff;
    z-index:50;
}
input[type=treeidsearch]:focus
{
    color:gold;
}
input[type=treeidsearch]:focus::placeholder
{
    color:black;
    text-shadow:none;
}
div.centermagnet
{
    text-align:center;
}
input[type=treeidsearch]
{
    text-align:center
    color:transparent;
    text-shadow:0 0 0 #ffffff;
    text-align:center;
}
input[type=treeidsearch]:focus
{
    outline:none;
    color:#ffffff;
    text-shadow:0 0 0 #ffffff;
    text-align:center;
}
input[type="submit"]{
    visibility:hidden;
}
input[type=treeidsearch]::placeholder
{
    color:#ffffff;
   margin-left:25px;
}
#blacknewuserquestion {
    position:absolute;
   left:-9px;
}
select {
-webkit-appearance:none; 
-moz-appearance:none;
appearance:none;
}
</style>
<script>
function blackout(){
document.getElementById("whiteoutgreenpeace").style.color = "transparent";
document.getElementById("MenuHomeHome").style.top = "255px";
document.getElementById("MenuHomeRegister").style.top = "424px";
document.getElementById("MenuHomeLogin").style.top = "423px";
document.getElementById("blacklogin").style.color = "#000000";
document.getElementById("blacknewuser").style.color = "#000000";
document.getElementById("blacknewuserquestion").style.color = "#000000";
document.getElementById("MenuHomeRegister").style.transform= "rotate(-37.75deg)";
document.getElementById("MenuHomeLogin").style.transform= "rotate(37.75deg)";
}
function whiteout(){
if (!document.getElementById("treeidsearch").value){
document.getElementById("blacklogin").style.color = "#ffffff";
document.getElementById("blacknewuser").style.color = "#ffffff";
document.getElementById("blacknewuserquestion").style.color = "#ffffff";
}
}
scrollTo(2000,2000);
</script>
</div>
</body>
</html>