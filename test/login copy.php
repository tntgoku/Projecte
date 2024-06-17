
<?php 
// $path="./User/index.php";
// if(file_exists($path)){
//     require $path;
// } else{
//    die("{$path} không tồn tại");
// }
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
    <form action="login.php" method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section style="display: flex; flex-direction:column;">
            <button type="submit" style="margin-bottom:10px;">Login</button>
            <a href="register.php">Register</a>
        </section>
    </form>
</main>
</body>
</html>