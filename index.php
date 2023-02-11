<?php

$insert = false;

if (isset($_POST['name'])) {
    // set connection variable 
    $server = "localhost";
    $username = "root";
    $password = "";
    // create a database connection
    $con = mysqli_connect($server, $username, $password);
    // check for connection success 
    if (!$con) {
        die("connection failed to connect due to " . mysqli_connect_error());
    }
    //echo "Success connecting to the db"

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $college_name = $_POST['college_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `gender`, `email`, `college_name`, `mobile`, `address`, `city`, `state`, `country`, `other`, `dt`) 
          VALUES ('$name', '$gender', '$email', '$college_name','$mobile', 
          '$address','$city', '$state', '$country','$other', current_timestamp())";

    // Execute the query
    if ($con->query($sql) == true) {
        // echo "Successfully Inserted";

        // flag for successful insertion 
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
    // close the database connection 
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to travel form</title>
</head>

<body>
    <img class="ipu" src="ipu.jpg" alt="IP University">
    <div class="container">
        <h1>Guru Gobind Singh Indraprastha University <br> University US Trip Form</h1>
        <p>Enter your Details and submit your forms to confirm your participation in the US Trip </p>
        <p class='submitMsg'> </p>
        <?php

        if ($insert == true) {
            echo " <p class = 'submitMsg'> Thanks you for Submistting your form. 
             We are happy to see you joining us for the us trip </p> ";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email - abc@gmail.com">
            <input type="text" name="college_name" id="college_name" placeholder="Enter Your College Name ">
            <input type="number" name="mobile" id="mobile" placeholder="Enter Your Phone Number">
            <input type="text" name="address" id="address" placeholder="Enter Your Address">
            <input type="text" name="city" id="city" placeholder="Your City ">
            <input type="text" name="state" id="state" placeholder="Your State">
            <input type="text" name="country" id="country" placeholder="Your Country">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter Other Infomation"></textarea>
            <input class="submit" type="submit" value="Submit">
        </form>
    </div>

    <script src="index.js"></script>
</body>

</html>

