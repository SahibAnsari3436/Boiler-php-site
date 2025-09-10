<?php
include 'includes/config.php';

if (isset($_POST['save'])) {
    $site_title = $_POST['site_title'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];

    // Logo Upload
if ($_FILES['logo']['name'] != '') {
    $original_logo = $_FILES['logo']['name'];
    $logo_name = strtolower(preg_replace('/[^A-Za-z0-9\-_\.]/', '', $original_logo)); // sanitize
    move_uploaded_file($_FILES['logo']['tmp_name'], '../uploads/' . $logo_name);
    mysqli_query($con, "UPDATE settings SET logo='$logo_name' WHERE id=1");
}

// Favicon Upload
if ($_FILES['favicon']['name'] != '') {
    $original_favicon = $_FILES['favicon']['name'];
    $favicon_name = strtolower(preg_replace('/[^A-Za-z0-9\-_\.]/', '', $original_favicon)); // sanitize
    move_uploaded_file($_FILES['favicon']['tmp_name'], '../uploads/' . $favicon_name);
    mysqli_query($con, "UPDATE settings SET favicon='$favicon_name' WHERE id=1");
}

    // Update all other fields
    mysqli_query($con, "UPDATE settings SET 
        site_title='$site_title',
        email='$email',
        phone='$phone',
        address='$address',
        facebook='$facebook',
        twitter='$twitter',
        instagram='$instagram',
        linkedin='$linkedin'
        WHERE id=1");

    header("Location: settings_edit.php?status=success");
    exit;
}
