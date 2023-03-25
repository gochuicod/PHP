<?php
    include './includes/database_connection.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $email = $_POST['email'];
        $firstname = ucwords($_POST['firstname']);
        $lastname = ucwords($_POST['lastname']);
        $username = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);

        $sql = "UPDATE users SET email='$email', firstname='$firstname', lastname='$lastname', username='$username', password='$password' WHERE id=$id";

        if ($conn->query($sql) === TRUE) header("Location: ./home.php");
        else echo "Error deleting user: " . $conn->error;
    }

    $conn->close();
?>