<?php
/* -------------------- COMMON HEADER ---------------------- */
$base = dirname(__FILE__);
while ($base and (!is_dir($base.'/include'))) $base = preg_replace('+/[^/]*$+', '', $base);
$include = $base . '/include';
if (!is_dir($include)) { print "ERROR => Couldn't find include folder!\n"; exit; }
require_once($base . '/config/config.inc.php');
/* --------------------------------------------------------- */

// // Redirect them to HTTPS if they're not already logged in
// if (!loggedIn()) {
//     echo <<<EOL
// <html><body>
// Redirecting you to: <a href="{$https}{$baseURL}/login.php">{$https}{$baseURL}/login.php</a>
// <script type="text/javascript"><!--
//     setTimeout("window.location = \"{$https}{$baseURL}/login.php\";", 1000);
// --></script>
// </body></html>
// EOL;
//     exit;
// }

// MP: Since we know ONA will generate a ton of notice level errors, lets turn them off here
// I dont believe this will be impactful to anyone. keep an eye out for it however.
error_reporting (E_ALL ^ E_NOTICE);

// Start out the session as a guest with level 0 access.  This is for view only mode.
if (!$_SESSION['ona']['auth']['user']['username']) {
    $_SESSION['ona']['auth']['user']['username'] = 'guest';
    get_perms('guest');
}

// Include xajax stuff (ajax calls will never make it past this line)
require_once($conf['inc_xajax_stuff']);

// Set the title of this web page here:
$conf['title'] .= "0wn Your Network";

// Include "Desktop" Framework
require_once($conf['html_desktop']);

?>