<?php 

include_once __DIR__ . '/../admin/includes/config.php';

$setting_query = mysqli_query($con, "SELECT * FROM settings WHERE id = 1");
$setting = mysqli_fetch_assoc($setting_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- Title -->
	<!-- <title><?= $setting['site_title']?></title> -->
	<title><?= isset($pageTitle) ? $pageTitle : '' ?> | <?= htmlspecialchars($setting['site_title']) ?> </title>
	
	<!-- Meta -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="IndianCoder">
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="chemical, company, construction, corporate business, energy industry, engineering, factory, industrial, industry, manufacturing, mechanical, mining, oil gas petroleum plant, pharmaceutical, refinery">
	<meta name="description" content="The Industry - Factory & Industrial Bootstrap HTML Template provides an easy and visually appealing platform to showcase your work to clients, Ideal for construction, corporate business and industrial.">
	<meta property="og:title" content="Industry - Factory & Industrial Bootstrap HTML Template">
	<meta property="og:description" content="The Industry - Factory & Industrial Bootstrap HTML Template provides an easy and visually appealing platform to showcase your work to clients, Ideal for construction, corporate business and industrial.">
	<meta property="og:image" content="https://industry.indiankoder.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon icon -->
    <link rel="icon" type="image/png" href="images/<?= $setting['favicon']?>">
    
	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="vendor/twentytwenty-master/css/twentytwenty.css">
    <link href="vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
	<link href="vendor/magnific-popup/magnific-popup.min.css" rel="stylesheet">
	<link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="vendor/aos/aos.css" rel="stylesheet">
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
	
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
	<link class="skin" rel="stylesheet" href="css/skin/skin-1.css">

</head>