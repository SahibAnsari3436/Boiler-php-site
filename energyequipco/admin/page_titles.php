<?php
$current_file = basename($_SERVER['PHP_SELF']);

$page_titles = [
  'home.php' => 'Dashboard',
  'settings_edit.php' => 'Site Information',
  'about-us.php' => 'About Us',
  'boilers.php' => 'Boilers',
  'manufacturers.php' => 'Manufacturers',
  'contact-us.php' => 'Contact Us',
  'cleaver-brooks-boilers.php' => 'Cleaver Brooks',
  'johnston-boilers.php' => 'Johnston',
  'superior-boilers.php' => 'Superior',
  'hurst-boilers.php' => 'Hurst Boilers',
  'additional-boilers.php' => 'Additional Boilers',
  'testimonial.php' => 'Testimonials',
  // Add more as needed
];

$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Page';
?>
