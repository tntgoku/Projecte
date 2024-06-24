<?php 
session_start(); // Start the session at the beginning of the script

include '../App/connect.php';
$data = new Database();
$data->connect();
// Code nay no ko chay
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    //$pwd = md5($pwd); 

    function escape_string($input) {
        return str_replace(
            array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a"),
            array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z"),
            $input
        );
    }

    $user = escape_string($user);
    $pwd = escape_string($pwd);

    $sql = "SELECT * FROM user WHERE Login_name = '$user' AND pass = '$pwd'";
    $result = $data->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_user'] = $row['id_user'];
        echo $_SESSION['id_user']; // Output the session id_user for debugging
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <form action="login_proces.php" method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section style="display: flex; flex-direction: column;">
            <button type="submit" style="margin-bottom: 10px;" name="login">Login</button>
            <a href="register.php">Register</a>
        </section>
    </form>
</main>
</body>
</html>
