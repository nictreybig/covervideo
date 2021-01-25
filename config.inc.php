<?php
// This script will define constants and settings, dictates how errors are handled, defines useful functions //

// Nicholas Treybig 2020

// START SETTINGS //

// Flag variable for site status:
define('LIVE', TRUE);

// Admin contact address:
define('EMAIL', 'InsertRealAddressHere');

// Site URL (base for all redirections):
define('BASE_URL', 'https://applytree.com/');

// Location of the MySQL connection script:
define('MYSQL', 'mysqli_connect.php');

// Adjust the time zone for PHP 5.1 and greater:
date_default_timezone_set('America/New_York');

// END SETTINGS //



// START ERROR MANAGEMENT //

// Start-my_error_handler:
    function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) 
{

// Build the error message:
	$message = "An error occurred in script '$e_file' on line $e_line: $e_message\n";

// Add the date and time:
	$message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n";

	if (!LIVE) 
	{

// Show the error message:
		echo '<div class="error">' . nl2br($message);

// Add the variables and a backtrace:
		echo '<pre>' . print_r ($e_vars, 1) . "\n";
		debug_print_backtrace();
		echo '</pre></div>';

    }
	else 
	{
	    if ($e_number != E_NOTICE) 
	    {
			echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div><br>';
		}
	} // End of !LIVE else

} // End - my_error_handler() definition.

// Use the error handler:
set_error_handler('my_error_handler');

// END ERROR MANAGEMENT //
