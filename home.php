<?php require_once './includes/header_homepage.php' ?>

<?php
    session_start();

    if(!isset($_SESSION['id'])) {
        header("Location: ./");
        exit();
    }

    function display($username,$query){
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            echo "<tr>";
            echo "<th scope='row'>".$row["username"]."</th>";
            echo "<td>".$row["firstname"]."</td>";
            echo "<td>".$row["lastname"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td><a href='' data-id='$id' data-fname='$fname' data-lname='$lname' data-bs-toggle='modal' data-bs-target='#userForm' onclick='formData(this)'><i class='bi bi-pencil-square'></a></td>";
            if($username == "admin"){
                echo "<td><a href='user_delete.php?id=$id'><i class='bi bi-x-circle-fill text-danger'></a></td>";
            }
            echo "</tr>";
        }
    }
?>

<nav class="navbar bg-white shadow">
    <div class="container-fluid">
        <a class="navbar-brand">User Management</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
</nav>

<section class="mt-5 mx-5">
    <table class="table table-striped text-center rounded shadow">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">E-mail</th>
                <th scope="col">Edit</th>
                <?php
                    if($_SESSION['username'] == "admin") {
                        echo '<th scope="col">Delete</th>';
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                include './includes/database_connection.php';
                $id = $_SESSION['id'];
                if($_SESSION['username'] == "admin") display($_SESSION['username'],$conn->query("SELECT * FROM users"));
                else display($_SESSION['username'],$conn->query("SELECT * FROM users WHERE id = $id"));
            ?>
        </tbody>
    </table>
</section>

<section>
    <div class="modal fade" id="userForm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="p-5" action="user_update.php" method="post">
                        <p class="user_edit_text"></p>
                        <input class="user_id form-control" type="text" name="id" value="" hidden/>
                        <input class="email form-control" type="email" name="email" placeholder="E-mail" required/>
                        <input class="form-control mt-3" type="text" name="firstname" placeholder="Firstname" required/>
                        <input class="form-control mt-3" type="text" name="lastname" placeholder="Lastname" required/>
                        <input class="username form-control mt-3" type="text" name="username" placeholder="Username" required/>
                        <input class="form-control mt-3" type="password" name="password" placeholder="Password" required/>
                        <button class="btn btn-primary form-control mt-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once './includes/footer.php' ?>