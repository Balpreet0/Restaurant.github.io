<?php
// Include server-side validation and error handling
include('server.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password_1'];

    // Validate input (you can add more validation rules)
    // ...

    // Create a new user element
    $user = new SimpleXMLElement('<user/>');
    $user->addChild('username', $username);
    $user->addChild('email', $email);
    $user->addChild('password', $password);

    // Load existing XML file or create a new one
    $xml = simplexml_load_file('users.xml');
    $xml->addChild('user', $user);

    // Save changes back to the XML file
    $xml->asXML('users.xml');

    // Redirect to a success page or login page
    header('Location: success.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration System using PHP and XML</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>
<form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>Already a member? <a href="login.php">Sign in</a></p>
</form>
</body>
</html>