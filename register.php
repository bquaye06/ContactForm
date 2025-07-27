<?php
// CONNECT TO THE DATABASE
$conn = mysqli_connect('localhost', 'root', 'Benedicta@22', 'client_registration');

// CHECK CONNECTION
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

// RETRIEVE DATA FROM HTML FILE
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $agree_terms = isset($_POST['agree_terms']) ? 1 : 0;
    $receive_newsletter = isset($_POST['receive_newsletter']) ? 1 : 0;
}

// ENSURE ALL FEILDS ARE PRESENT
if (!$email || !$password || !$first_name || !$last_name || !$gender || !$country || !$agree_terms) {
    die("Please complete all required fields.");
}

// INSERT DATA INTO DATABASE
$sql = "INSERT INTO clients(email,password,first_name,last_name,gender,country,agree_terms,receive_newsletter) VALUES('$email','$password','$first_name', '$last_name', '$gender','$country','$agree_terms','$receive_newsletter')";

if(mysqli_query($conn, $sql)){
    echo 'Registration Successful!';
}else{
    echo 'Error: ' . mysqli_error($conn);
}
?>