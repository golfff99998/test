<?php 

    session_start();
    

    if (isset($_POST['username'])) {

        include('conn.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);
        
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$passwordenc'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['username']= $row['username'];
            $_SESSION['userlevel'] = $row['userlevel'];

            if ($_SESSION['userlevel'] == 'am') {
                header("Location: page.php");
            }

            if ($_SESSION['userlevel'] == 'm') {
                header("Location: page.php");
            }
        } else {
            header("Location: main.php");
        }

    } else {
        header("Location: main.php");
    }


?>