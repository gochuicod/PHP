<!-- Last topic visited (PHP): Syntax -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Training Area</title>
</head>
<body>
    <section>
        <h1>Activity 1</h1>
        <?php
            echo '<p>Hello World</p>';
            echo 'HTTP USER AGENT: ', $_SERVER['HTTP_USER_AGENT'];
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
                echo 'You are using Internet Explorer.<br />';
            }
            ?>
    </section>
    
    <br><br>
    
    <section>
        <h1>Activity 2</h1>
        <form action="add_person.php" method="post">
            <p>Firstname: <input type="text" name="firstname" /></p>
            <p>Lastname: <input type="text" name="lastname" /></p>
            <p>Age: <input type="text" name="age" /></p>
            <p><input type="submit" /></p>
        </form>
    </section>
    
    <br><br>
    
    <section>
        <h1>Activity 3</h1>
        <?php
            $sample_array = [12, true, 'Hello World', NULL];
            for($i = 0; $i <= count($sample_array)-1; $i++){
                echo 'Type: ', var_dump($sample_array[$i]), '<br>';
            }
            echo 'Null or not: ';
            if(is_null($sample_array[3]) == 1) echo 'True';
            else echo 'False';
            echo '<br>';
            unset($sample_array[0]); // this line removes the value 12
            
            array_splice($sample_array,0,0,12); // splice takes parameters of (array, start, length, array) so this adds 12 to index 0
            echo 'Array: ',implode(", ",$sample_array,); // prints each item in the array
        ?>
    </section>
</body>
</html>