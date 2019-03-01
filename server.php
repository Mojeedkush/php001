<?php
session_start();
require_once('connect.php');

$firstname = checkInput($_POST['txtFirstname']);
$lastname = checkInput($_POST['txtLastname']);
$email = checkInput($_POST['txtEmail']);
$username = checkInput($_POST['txtUsername']);
$mobile = checkInput($_POST['txtMobile']);
$password = checkInput($_POST['txtPassword']);
$confirmPassword = checkInput($_POST['txtConfirmPassword']);

if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($mobile) || empty($password) || empty($confirmPassword) ) {
  $_SESSION['errMsg'] = 'All fields are required!';
  header("Location: signup.php");
} 
else if (!(preg_match("/^([A-Za-z0-9_\.\-])+\@([A-Za-z])+\.([A-Za-z]{2,3})$/", $email))){
  $_SESSION['errMsg'] = 'Invalid email';
  header("Location: signup.php");
}
else if (!(preg_match("/^[0-9]+$/", $mobile))){
  $_SESSION['errMsg'] = 'only numbers are allowed';
  header("Location: signup.php");
  
}
else if (!($password == $confirmPassword)){
  $_SESSION['errMsg'] = 'Password does not match';
  header("Location: signup.php");
}
else {

    $userID = "P_" . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
    $new_password = crypt($password, 'salt');
    
    // $userID = "P_" . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
    // $new_pass = crypt($password, "door");

    $sendData = mysqli_query($connect, 
                "INSERT into tbl_practice (UserID, Firstname, Lastname, Email, Username, Password, Mobile) 
                VALUES ('$userID', '$firstname', '$lastname', '$email', '$username', '$new_password', '$mobile')");

    if($sendData){
      $_SESSION['sucMsg'] = 'Registration Successful!';
        header("Location: signup.php");
    }
    else{
      $_SESSION['notSuc'] = 'Not successful';
      header("Location: signup.php");
    }
  // $_SESSION['sucMsg'] = 'Registration Successful!';
  // header("Location: signup.php");
  // echo 'Firstname is: ' . $firstname . '<br>' ;
  // echo 'Lastname is: ' . $lastname . '<br>';
  // echo 'Email is: ' . $email . '<br>';
  // echo 'Username is: ' . $username . '<br>';
  // echo 'Mobile Number is: ' . $mobile . '<br>';
  // echo 'Password is: ' . $password . '<br>';
  // echo 'Password confirmed: ' . $confirmPassword . '<br>';
}

function checkInput($input){
  $formTrim = trim($input);
  $formStrips = stripslashes($formTrim);
  $formSpecial = htmlspecialchars($formStrips);
  return $formSpecial;
}


?>