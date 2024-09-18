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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <img src="bg.jpg" alt="bg">
    <div class="container">
        <?php

        if ($insert == true) {
            header("Location: success.php");
            exit;
        }
        ?>
        <span>FORM</span>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter name" required />
            <input type="number" name="age" id="age" placeholder="Enter age" required />
            <input type="number" name="number" id="number" placeholder="Enter number" required />
            <input type="email" name="email" id="email" placeholder="Enter email" required />
            <textarea name="text" id="text" cols="30" rows="10" placeholder="Enter text" autocomplete="on" spellcheck></textarea>
            <label for="checkbox"><input type="checkbox" id="checkbox" required>I accept the <a href="" id="termsnconditions">terms and conditions.</a></label>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>