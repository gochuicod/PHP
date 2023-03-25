<?php require_once './includes/header.php' ?>

<section class="d-flex flex-row justify-content-center">
    <form class="mt-5 p-5 shadow rounded rounded-4" action="index.php" method="post">
        <input class="form-control" type="text" name="username" placeholder="Username" required/>
        <input class="form-control my-3" type="password" name="password" placeholder="Password" required/>
        <button class="btn btn-primary form-control mt-2" type="submit">Log In</button>
        <div class="d-flex flex-row justify-content-center mt-3">
            <a class="createNewAccount btn btn-success mt-4" href="./registration.php">Create a New Account</a>
        </div>
    </form>
</section>

<?php require_once './includes/footer.php' ?>

<?php
    session_start();

    include './includes/database_connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password,$row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header("Location: ./home.php");
        } else header("Location: ./");
    }
    
    $conn->close();
?>