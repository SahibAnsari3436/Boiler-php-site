<?php
include ('admin/includes/config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name  = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $phone      = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject    = mysqli_real_escape_string($conn, $_POST['subject']);
    $message    = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_form (first_name, last_name, email, phone, subject, message) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Form submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>