<?php
session_start();
//get user input
$email = $_POST['email'];
$password = $_POST['password'];

$data_base = "../storage/users.csv"; 
$open = fopen($data_base, "r");
// read the entire file into a string
$string_mode = file_get_contents("../storage/users.csv");

$csv_file = array_map('str_getcsv', file('../storage/users.csv'));
//name section
$c_name = array_column($csv_file, 0);
//email section
$c_email = array_column($csv_file, 1);
//password session
$c_password = array_column($csv_file, 2);
//search the array row using the email in the email column, return the key of the array
$search = array_search($email, $c_email);
//search the array row using the password in the password column, return the key of the array
$search_password = array_search($password, $c_password);

//save the row where the user is present in the variable
$row = ($csv_file[$search]);

$_SESSION['user'] = ($row[0]);

$file_email = ($row[1]);

$file_password = ($row[2]);

if ($file_email == $email and $file_password == $password) {
    echo '<script>alert("Welcome ' . $_SESSION['user'] . ' ");
              header: location="../dashboard.php";
              </script>';
} else {
    echo '<script>alert("Invalid Username or Password");
              header: location="../forms/login.html";
              </script>';

}
