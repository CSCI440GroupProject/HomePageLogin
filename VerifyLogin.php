<?php
    session_start();
    $db_host = "fdb28.awardspace.net";
    $db_name = "4189440_csci440group";
    $db_user = "4189440_csci440group";
    $db_pass = "CSCI440!";

    $mysqli_connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if ($mysqli_connection->connect_error) {
        echo "Could not connect to $db_user, error: " . $mysqli_connection->connect_error;
    }

    $username = $_POST['username'];
    $userPassword = $_POST['user-password'];

    $sql = "SELECT UserProfile.username, UserProfile.userPassword
    FROM UserProfile
    WHERE UserProfile.username = '$username'";

    $rs = $mysqli_connection->query($sql);
    $row = $rs->fetch_assoc();
    $pwd = $row['userPassword'];

    if ($userPassword == $pwd)
    {
        $_SESSION['verified_user'] = $username;
        //echo "username and password correct.";
        header('Location: http://csci440.com/LogWorkout.html');
    }
    else
    {
        //echo "incorrect";
        header('Location: http://csci440.com/HomePage.html');
        exit();
    }

    $mysqli_connection->close();
?>
