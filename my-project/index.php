<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    $sql = "INSERT INTO `learningphp`.`form` (`name`, `age`, `number`, `email`, `text`, `date`) VALUES ('$name', '$age', '$number', '$email', '$text', current_timestamp());";

    // Execute the query
    if ($con->query($sql) == true) {
        // Flag for successful insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
