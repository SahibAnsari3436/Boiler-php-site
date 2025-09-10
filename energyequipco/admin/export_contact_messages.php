<?php
require_once("includes/config.php"); // Your DB connection

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="contact_messages.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Output column headers
fputcsv($output, ['Full Name', 'Email', 'Phone', 'Subject', 'Message', 'Created At']);

// Fetch data
$sql = "SELECT first_name, last_name, email, phone_number, subject, message, created_at FROM contact_enquiry ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $full_name = $row['first_name'] . ' ' . $row['last_name'];
    fputcsv($output, [
        $full_name,
        $row['email'],
        $row['phone_number'],
        $row['subject'],
        $row['message'],
        $row['created_at']
    ]);
}

fclose($output);
exit;
?>
