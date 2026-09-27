<?php
/*
  ========================================================================
  IWT Academic Assignment - logout.php
  ------------------------------------------------------------------------
  Purpose:
  1. Resume session
  2. Unset all session variables ($_SESSION = array())
  3. Destroy the PHP session
  4. Break out of HTML frameset and redirect top browser window to login.html
  ========================================================================
*/

session_start();

// Unset session variables
$_SESSION = array();

// Destroy session cookie if set
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy session
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Logging out...</title>
  <script type="text/javascript">
    // Break out of frameset and redirect top window to login.html
    window.top.location.href = 'login.html';
  </script>
</head>
<body>
  <p>Logging out... If you are not redirected automatically, <a href="login.html" target="_top">click here</a>.</p>
</body>
</html>
