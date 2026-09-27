<?php
/*
  ========================================================================
  IWT Academic Assignment - content.php
  ------------------------------------------------------------------------
  Purpose:
  1. Resumes the PHP session
  2. Verifies authentication (redirects to login if session missing)
  3. Displays user welcome message & persistent session hit counter
  4. Renders structured academic assignment status cards
  ========================================================================
*/

// Resume PHP session
session_start();

// Check if user is logged in via session
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect the top window to login.html
    echo "<script>window.top.location.href = 'login.html';</script>";
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
$hitcount = isset($_SESSION['hitcount']) ? intval($_SESSION['hitcount']) : 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Content</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <!-- Card 1: User Welcome & Session Information -->
  <div class="card">
    <div class="card-title">
      <h1>Welcome back, <?php echo $username; ?>! 👋</h1>
      <span class="badge badge-success">Session Active</span>
    </div>
    <p>
      You have successfully logged into the <strong>Internet & Web Technology (IWT)</strong> 5th Semester Student Dashboard.
    </p>

    <!-- Hit counter highlight box -->
    <div style="background-color: #f0f7fc; border-left: 4px solid #2f6fa7; padding: 12px 16px; margin: 15px 0; border-radius: 0 6px 6px 0;">
      <h3 style="margin-bottom: 4px;">📈 Session Hit Counter</h3>
      <p style="margin: 0; font-size: 15px;">
        Total Portal Logins (Persistent File Count): 
        <strong style="color: #2f6fa7; font-size: 18px;"><?php echo $hitcount; ?></strong> times
      </p>
    </div>
  </div>

  <!-- Card 2: Academic Assignment Feature Summary Table -->
  <div class="card">
    <h2>Project Syllabus Requirements Verification</h2>
    <p>Below is a breakdown of the core web technologies implemented in this project:</p>

    <table>
      <thead>
        <tr>
          <th>Requirement Concept</th>
          <th>Implementation Details</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>HTML4 Frameset Layout</strong></td>
          <td><code>&lt;frameset&gt;</code> splitting window into banner, nav, & mainFrame</td>
          <td><span class="badge badge-success">Completed</span></td>
        </tr>
        <tr>
          <td><strong>Client-side Image Map</strong></td>
          <td><code>&lt;map&gt;</code> & <code>&lt;area&gt;</code> with Circle & Rectangle hotspots in <code>banner.html</code></td>
          <td><span class="badge badge-success">Completed</span></td>
        </tr>
        <tr>
          <td><strong>PHP Session Management</strong></td>
          <td><code>session_start()</code>, <code>$_SESSION['username']</code>, <code>$_SESSION['hitcount']</code></td>
          <td><span class="badge badge-success">Completed</span></td>
        </tr>
        <tr>
          <td><strong>Persistent File Counter</strong></td>
          <td>Reading & incrementing count in <code>counter.txt</code> via <code>login.php</code></td>
          <td><span class="badge badge-success">Completed</span></td>
        </tr>
        <tr>
          <td><strong>Shared CSS Styling</strong></td>
          <td>Light blue background, navy headers, card layouts with rounded corners</td>
          <td><span class="badge badge-success">Completed</span></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Card 3: Quick Instructions for Evaluator -->
  <div class="card">
    <h2>Navigating the Assignment Demo</h2>
    <ul style="padding-left: 20px; font-size: 14px; line-height: 1.8;">
      <li>Click the <a href="home.html">Home Page</a> link or click the <strong>CIRCLE shape</strong> on the top logo banner.</li>
      <li>Click the <a href="about.html">About Page</a> link or click the <strong>RECTANGLE shape</strong> on the top logo banner.</li>
      <li>Log out using the sidebar menu and log back in to see the persistent hit counter increment!</li>
    </ul>
  </div>

</body>
</html>
