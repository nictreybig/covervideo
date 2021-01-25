<?php # Script 18.9 - logout.php
// This is the logout page for the site.
require('config.inc.php');
$page_title = 'Logout';
include('headerlogout.html');
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Logout</title>
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
 <style type="text/css" media="screen">@import "includes/layout.css";</style></head>
<?php
echo '<br><br>';
echo '<h3>No covervideo associated with this ID.</h3>';

include('footernocv.html');
?>
