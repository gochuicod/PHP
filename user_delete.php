<?php
    include "./includes/database_connection.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";

        if ($conn->query($sql) === TRUE) header("Location: ./home.php");
        else echo "Error deleting user: " . $conn->error;
    }

    $conn->close();
?>