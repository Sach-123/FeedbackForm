<?php
    $insert = false;
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to databse failed dut to" .mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO `feedback`.`fb` (`name`, `age`, `gender`, `email`, `phone`, `feedback`, `dt`) VALUES ('$name', '$age', '$gender', '$gender', '$phone', '$feedback', current_timestamp())";

    if($con->query($sql)==true){
        $insert = true;
    }else{
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,300&family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <img src="bg.jpg" alt="background image">
    <div class="container">
        <h1>Feedback Form</h1>
        <p>Help us improve by providing your feedback</p>
        <?php 
            if($insert==true){
                echo "<p class='submitMsg'>Thanks for giving your feedback</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Enter your name"/>
            <input type="number" name="age" placeholder="Enter your age"/>
            <input type="text" name="gender" placeholder="Enter your gender"/>
            <input type="email" name="email" placeholder="Enter your email"/>
            <input type="number" name="phone" placeholder="Enter your phone number"/>
            <textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="Give your feedback here..."></textarea>
            <button class="btn">Submit</button>
        </form> 
    </div>
</body>
</html>

