<?php 

    session_start();

    require_once "conn.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, userlevel)
                        VALUE ('$username', '$passwordenc', 'm')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: main.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: main.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter your username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        <br>
        
        <br>
        <input type="submit" name="submit" value="Submit">
    
    </form>

    <a href="main.php">Go back to index</a>
    
</body>
</html>