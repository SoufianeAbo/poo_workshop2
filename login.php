<?php
require_once 'connexion.php';

if (Auth::isAuthenticated()) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (Auth::login($username, $password)) {
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>

    <body>
        <h2>Login</h2>

        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <button type="submit">Login</button>
        </form>
    </body>
</html>
