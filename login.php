<?php
require './vendor/autoload.php';
use MongoDB\Client;

$client = new MongoDB\Client();
$database = $client->SewaKendaraan;
$collection = $database->selectCollection("admin");

session_start();

if (isset($_GET["username"]) && isset($_GET["password"])) {
    $username = $_GET["username"];
    $password = $_GET["password"];
    $hash = hash("sha256", $password);

    $query = [
        "username" => $username,
        "password" => $hash
    ];

    $result = $collection->findOne($query);

    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"];

        if ($password === $confirmPassword) {
            $hash = hash("sha256", $password);

            $newUser = [
                "username" => $username,
                "password" => $hash
            ];

            $result = $collection->insertOne($newUser);

            if ($result->getInsertedCount() > 0) {
                echo "User created successfully.";
            } else {
                echo "Failed to create user.";
            }
        } else {
            echo "Password and confirm password do not match.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="user signinBox">
                <div class="imgBox">
                    <img src="mobil.jpg" alt="">
                </div>
                <div class="formBox">
                    <form action="" method="GET">
                        <h2>Login</h2>
                        <input type="username" name="username" placeholder="Enter Email" id="">
                        <input type="password" name="password" placeholder="Enter Password" id="">
                        <input type="submit" value="Login">
                        <p class="signup">Don't have an Account? <a href="#" onclick="javascript:doToggle();">Sign Up</a></p>
                    </form>
                </div>
            </div>
            <div class="user signupBox">
                <div class="formBox">
                    <form action="" method="POST">
                        <h2>Create An Account</h2>
                        <input type="text" name="username" placeholder="Enter Username" id="">
                        <input type="password" name="password" placeholder="Enter Password" id="">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" id="">
                        <input type="submit" value="Sign Up">
                        <p class="signup">Already have an Account? <a href="#" onclick="javascript:doToggle();">Login</a></p>
                    </form>
                </div>
                <div class="imgBox">
                    <img src="motor.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function doToggle(){
            var container = document.querySelector('.container');
                container.classList.toggle('active')
        }
    </script>
</body>
</html>
