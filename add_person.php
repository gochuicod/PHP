<?php
    // Create connection
    $conn = new mysqli("localhost", "gochuicod", "20259388", "php_training");
    
    // Check connection
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    else echo "Connected successfully";

    // Store post data into these variables
    $firstname = ucfirst(htmlspecialchars($_POST['firstname']));
    $lastname = ucfirst(htmlspecialchars($_POST['lastname']));
    $age = (int)$_POST['age'];

    // This is the query
    $sql = "INSERT INTO Persons (firstname, lastname, age)
    VALUES ('$firstname', '$lastname', '$age')";

    // Reply if query pushed through
    if ($conn->query($sql) === TRUE) echo "New record created successfully";
    else echo "Error: " . $sql . "<br>" . $conn->error;

    $conn->close();
?>