<?php
$insert = false;
if (isset($_POST['name'])) {

    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";


    // create a database connection
    $connection = mysqli_connect($server, $username, $password);


    // check for connection success
    if (!$connection) {
        die("connection to this database failed due to " . mysqli_connect_error());
    }

    echo "database connection successful";


    // collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $residence = $_POST['residence'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $time = $_POST['time'];
    $textarea = $_POST['textarea'];

    $sql = "INSERT INTO `trip_record`.`trip_record` (`name`, `age`, `address`, `phone no.`, `email`, `time`, `other`, `dt`) VALUES ('$name', '$age', '$residence', '$phone', '$email', '$time', '$textarea', current_timestamp());";
    // echo $sql;


    // execute the query
    if ($connection->query($sql) == TRUE) {

        // flag for successful insertion
        $insert = true;
        // echo "inserted successfully";
    } else {
        echo "ERROR : $sql <br> $connection->error";
    }

    // close the database connection
    $connection->close();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="main_container column">
        <h1>Information regarding College Trip!</h1>

        <div class="inner_container column">
            <h2>Enter your details for comfirmation</h2>

            <?php
            if ($insert == true) {
                echo "<p>Thanyou for submitting this form !</p>";
            }
            ?>

            <form action="index.php" method="post" class="column">
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
                <input type="number" name="age" id="age" placeholder="Enter your age" required>
                <input type="text" name="residence" id="residence" placeholder="Enter your address" required>
                <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                <input type="time" name="time" id="time" placeholder="Enter your pick up time" required>
                <textarea class="desc" name="textarea" id="textarea" placeholder="Enter any improvement suggestions : "
                    required></textarea>
                <button class="btn" type="submit">Submit</button>

            </form>

        </div>
    </div>




    <script src="index.js"></script>
</body>

</html>