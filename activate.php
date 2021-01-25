<?php
// This page activates the user's account.
require('config.inc.php');
$page_title = 'Activate Your Account';
include('headeractivate.html');

// If $x and $y don't exist or aren't of the proper format, redirect the user:
if (isset($_GET['x'], $_GET['y'])
	&& filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)
	&& (strlen($_GET['y']) == 32 )
	) {

	// Update the database...
	require(MYSQL);
	$q = "UPDATE users SET active=NULL WHERE (email='" . mysqli_real_escape_string($dbc, $_GET['x']) . "' AND active='" . mysqli_real_escape_string($dbc, $_GET['y']) . "') LIMIT 1";
	$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br>MySQL Error: " . mysqli_error($dbc));

$q = "UPDATE users SET email=NULL WHERE (email='" . mysqli_real_escape_string($dbc, $_GET['x']) . "' AND active='" . mysqli_real_escape_string($dbc, $_GET['y']) . "') LIMIT 1";

	// Print a customized message:
	if (mysqli_affected_rows($dbc) == 1) {
		?>
		 <h3>Covervideo™ activated! Now click the moving login icon and get ready to paste or type your id (not email):</h3>
		 &emsp;&emsp;&emsp;&emsp;<a class="loginhover" href="https://covervideo.com/loginfirst.php" title="Login"><i class="fa fa-refresh fa-spin" style="font-size:144px;"></i></a>
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
    content: 'Verify cvid';
}
</style>
<br><br>
	<?php
	include('footeractivate.html');
	} else {
		echo '<p class="error">Your account could not be activated. Please try again.</p>';
	}
	?>
</div>
<?php
	mysqli_close($dbc);
} else { // Redirect.

	$url = "https://covervideo.com/";  // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.

} // End of main IF-ELSE.
?>
</div></div>
