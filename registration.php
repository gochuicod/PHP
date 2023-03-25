<?php require_once './includes/header_registration.php' ?>

<section class="d-flex flex-row justify-content-center">
    <form class="mt-5 p-5 shadow rounded rounded-4" action="registration.php" method="post">
        <input class="email form-control" type="email" name="email" placeholder="E-mail" required/>
        <input class="form-control mt-3" type="text" name="firstname" placeholder="Firstname" required/>
        <input class="form-control mt-3" type="text" name="lastname" placeholder="Lastname" required/>
        <input class="username form-control mt-3" type="text" name="username" placeholder="Username" required/>
        <input class="form-control mt-3" type="password" name="password" placeholder="Password" required/>

        <button class="btn btn-success form-control mt-4" type="submit">Sign Up</button>
        <div class="d-flex flex-row justify-content-center mt-3">
            <a class="backToLogIn btn btn-primary mt-4" href="./">Go back to Log In</a>
        </div>
    </form>
</section>

<?php require_once './includes/footer.php' ?>

<?php
    include './includes/database_connection.php';

    if(!empty($_POST)){
        $email = $_POST['email'];
        $firstname = ucwords($_POST['firstname']);
        $lastname = ucwords($_POST['lastname']);
        $username = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    
        $sql = "INSERT INTO users (email,firstname,lastname,username,password) VALUES ('$email','$firstname','$lastname', '$username', '$password')";
        $conn->query($sql);
    
        $conn->close();
    }
?>