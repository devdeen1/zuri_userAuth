<?php
if(isset($_POST['submit'])){
    $username =  $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

function registerUser($username, $email, $password){

$file = fopen("..\storage\users.csv","a");
fputcsv($file, $_POST);
fclose($file);
}

registerUser($username, $email, $password);

echo " <script>alert('User Successfully registered');
window.location='../forms/login.html';
</script>";

