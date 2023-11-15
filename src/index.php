<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 50px;
    }
    form {
      display: inline-block;
      text-align: left;
    }
  </style>
</head>
<body>

<div id="homePage">
  <h2>Login</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validatePassword()">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">Login</button>
  </form>
</div>

<div id="welcomePage" style="display: none;">
  <h2>Welcome!</h2>
  <p id="passwordDisplay"></p>
  <button onclick="logout()">Logout</button>
</div>

<?php
// PHP code for password validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Load common passwords from an external file
  $commonPasswords = file('https://raw.githubusercontent.com/danielmiessler/SecLists/master/Passwords/Common-Credentials/10-million-password-list-top-1000.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  $passwordInput = $_POST["password"];

  // Check password requirements
  if (strlen($passwordInput) >= 10 && !in_array($passwordInput, $commonPasswords)) {
    // Password meets requirements, set a JavaScript variable
    echo "<script>var showWelcome = true;</script>";
  } else {
    // Password does not meet requirements, set a JavaScript variable
    echo "<script>var showWelcome = false;</script>";
  }
}
?>

<script>
  // Check the JavaScript variable set by PHP
  if (typeof showWelcome !== 'undefined' && showWelcome) {
    showWelcomePage('<?php echo $passwordInput; ?>');
  } else if (typeof showWelcome !== 'undefined' && !showWelcome) {
    alert('Password does not meet the requirements.');
  }

  function showWelcomePage(password) {
    document.getElementById("homePage").style.display = "none";
    document.getElementById("welcomePage").style.display = "block";
    document.getElementById("passwordDisplay").innerText = "Your password: " + password;
  }

  function logout() {
    document.getElementById("homePage").style.display = "block";
    document.getElementById("welcomePage").style.display = "none";
  }
</script>

</body>
</html>
