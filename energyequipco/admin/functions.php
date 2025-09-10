<?php
function get_setting($key, $conn) {
    $query = "SELECT setting_value FROM site_settings WHERE setting_key = '$key'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row ? $row['setting_value'] : '';
}
?>
