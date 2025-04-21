<?php
//establish connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "businessdb";
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "<br> ?Could <i>not</i> connect! <br>";
}
if ($conn) {
    echo "<br> *You are <i>connected!</i> <br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Connection</title>
</head>

<body style="text-align: center">
    <section>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <h1><u>You can register here:</u></h1>
            email:<br>
            <input type="text" name="username"><br>
            password:<br>
            <input type="password" name="password"><br> <br>
            <input type="submit" name="submit" value="register">
        </form> <br>
        <h2>Why?</h2>
        <p>By entering an email, you can sign up for the newsletter and be up to date!</p>
        <button><a href="home.html">Go back home</a></button> <br> <br>
    </section>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        echo "Please enter an email";
    } elseif (empty($password)) {
        echo "Please enter a password";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, password)
                VALUES ('$username', '$hash')";
        try {
            mysqli_query($conn, $sql);
            echo "<br> You are now registered!";
        } catch (mysqli_sql_exception) {
            echo "<br> That password is taken, please choose another one";
        }
    }
}

mysqli_close($conn);
?>