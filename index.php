<?php
$insert = false;
 if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
    // echo "success connecting to db";
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $sql= "INSERT INTO `us_trip`.`trip` (`name`, `phone`, `age`, `gender`, `email`, `desc`, `date`) VALUES ('$name', '$phone', '$age', '$gender', '$email', '$desc', current_timestamp());";


    if($con->query($sql)==true){
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.png" class="bg" alt="GNIOT">
     <div class="container">
        <h1>Welcome to GNIOT US Trip form</h1>
        <p>Please Submit by entering your details below to confirm your participation</p>
     <?php   
        if($insert){
        echo "<p class='submitMsg'>Thanks for submiting your form, we are happy to see you joining us for the US Trip</p>";
       }
     ?>  
        <form action="index.php" method="post">
             <input type="text" name="name" id="name" placeholder="Enter your name">
             <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
             <input type="text" name="age" id="age" placeholder="Enter your age">
             <input type="text" name="gender" id="gender" placeholder="Enter your gender">
             <input type="email" name="email" id="email" placeholder="Enter your email">
             <textarea name="desc" id="desc" cols="30" rows="10"placeholder="Enter any comment here.."></textarea><br>
             <button class="btn" type="submit">Submit</button>
        </form>
     </div>
     <script src="index.js"></script>
</body>
</html>