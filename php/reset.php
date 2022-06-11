<?php

$email = $_POST['email'];
$password = $_POST['password'];


$csv_file = array_map('str_getcsv', file('../storage/users.csv'));

$c_email = array_column($csv_file, 1);
$search = array_search($email, $c_email);
$row = ($csv_file[$search]);
$row[2] = $password;
$new = $row;
$csv_file[$search] = $new;


$path = "../storage/users.csv"; //file path
$open = fopen($path, "w");
foreach ($csv_file as $insert) {
    $confirm = fputcsv($open, $insert);
}
if ($confirm) {
    echo " <script>alert('Password Reset successful');
        window.location='../forms/login.html';
    </script>";
} else {
    echo " <script>alert('User does not exist');
        window.location='../forms/login.html';
    </script>";
}
fclose($open);
?>