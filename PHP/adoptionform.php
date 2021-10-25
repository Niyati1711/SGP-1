<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];


    $conn = new mysqli('localhost','root','','details');

    if ($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    } else {
    
        $stmt = $conn->prepare("inset into adoptionform ( firstname , lastname , email,phone,add1,add2,date,month,year) 
        values(?,?,?,?,?,?,?,?,?)");
        $stmt ->bind_param("sssissiii", $firstname , $lastname , $email , $phone , $add1 , $add2 , $date , $month , $year);
        $stmt ->execute();
            echo "Your Adoption request has been successfully submitted.";
        $stmt ->close();
        $conn ->close();
    }

?>

