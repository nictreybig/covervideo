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
 <?php # Script 18.9 - logout.php
// This is the logout page for the site.
require('config.inc.php');
$page_title = 'Logout';
include('headerlogout.html');
if (!isset($_SESSION['first_name'])) 
{
    if (!isset($_SESSION['user_level']))
    {
        if(!isset($_SESSION['co_0']))
        {
            if(!isset($_SESSION['job_0']))
            {
        
                $url = BASE_URL . ''; // Define the URL.
    	        ob_end_clean(); // Delete the buffer.
	            header("Location: $url");
	            exit(); // Quit the script.
	   
	            
            }
            else
            { // Log out the user.

        	    $_SESSION = []; // Destroy the variables.
        	    session_destroy(); // Destroy the session itself.
        	    setcookie(session_name(), '', time()-3600); // Destroy the cookie.
            }
        }
        else
        { // Log out the user.

	        $_SESSION = []; // Destroy the variables.
	        session_destroy(); // Destroy the session itself.
	        setcookie(session_name(), '', time()-3600); // Destroy the cookie.
        }
    }
    else
    { // Log out the user.

	    $_SESSION = []; // Destroy the variables.
	    session_destroy(); // Destroy the session itself.
	    setcookie(session_name(), '', time()-3600); // Destroy the cookie.
    }
}
else
{ // Log out the user.

	$_SESSION = []; // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie(session_name(), '', time()-3600); // Destroy the cookie.
}

echo '<br><br>';
echo '<h3>You may now make like a tree and leaf.</h3>';

include('footer.html');
?>
