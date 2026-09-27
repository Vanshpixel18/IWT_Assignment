<?php
/*
  ========================================================================
  IWT Academic Assignment - login.php
  ------------------------------------------------------------------------
  Purpose:
  1. Handles form submission from login.html
  2. Starts a PHP user session
  3. Reads & increments a file-based hit counter (counter.txt)
  4. Stores session data ($_SESSION['username'], $_SESSION['hitcount'])
  5. Redirects the user to the frameset page (index.html)
  ========================================================================
*/

// Step 1: Start/Resume PHP Session
session_start();

// Step 2: Read submitted username from POST request (default to 'Student' if empty)
$username = isset($_POST['username']) && !empty(trim($_POST['username'])) 
            ? trim($_POST['username']) 
            : 'Student';

// Step 3: File-based persistent Hit Counter Logic
$counterFile = 'counter.txt';
$currentHits = 0;

// Read existing hit count from file if it exists
if (file_exists($counterFile)) {
    // file_get_contents reads file into string
    $fileContent = file_get_contents($counterFile);
    $currentHits = intval(trim($fileContent));
}

// Increment hit count by 1 for this session
$newHits = $currentHits + 1;

// Write updated hit count back to counter.txt
file_put_contents($counterFile, $newHits);

// Step 4: Save username and counter value in $_SESSION superglobal array
$_SESSION['username'] = $username;
$_SESSION['hitcount'] = $newHits;

// Step 5: Redirect user to the HTML Frameset layout page (index.html)
header("Location: index.html");
exit(); // Always call exit() after header redirection
?>
