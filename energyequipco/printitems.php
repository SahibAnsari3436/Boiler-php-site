<?php
include('inc/head.php');

// Map the boiler type to its respective tables
$boilerTypes = [
    'cleaver'   => ['boiler_details', 'cleaver_table'],
    'other'     => ['other_boilers', 'other_table'],
    'superior'  => ['superior_boiler', 'superior_table'],
    'johnston'  => ['johnston_boiler', 'johnston_table'],
    'hurst'     => ['hurst_boiler', 'hurst_table']
];

// Get boiler type from query string
$type = isset($_GET['type']) ? $_GET['type'] : '';

if (!array_key_exists($type, $boilerTypes)) {
    die("Invalid boiler type selected.");
}

list($boilerTable, $itemTable) = $boilerTypes[$type];

// Fetch boiler details (latest one)
$boiler = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $boilerTable ORDER BY id DESC LIMIT 1"));

// Fetch all items
$items = mysqli_query($con, "SELECT * FROM $itemTable ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo ucfirst($type); ?> Boilers - Printable Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #fff;  Padding: 3%; 5%;}
        .boiler-details { text-align: center; margin-top:3%; margin-bottom: 3%; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .t-head th{ border: 1px solid #000; padding: 8px; color: #fff; background-color: #000; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center;}
        th { background-color: #fff; }
        .btn{
            border: none;
            border-radius: 5px;
            background-color: #a91212;
            color: #fff;
            font-size: 16px !important;
            padding: 10px 30px !important;
            margin: 0px 6px;
        }
        .btn:hover{
            border-radius: 5px;
            background-color: #000;
            color: #fff;
        }

        .contact-details{
          margin-left: 50px;
        }

                @media print {
    .no-print {
        display: none !important;
    }

    @page {
        size: A4 portrait;  /* keep portrait */
        margin: 10mm;       /* small but safe margin */
    }

    html, body {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        height: 100% !important;
    }

    .container, .print-area {
        margin: 0 auto !important;
        padding: 0 !important;
        width: 90% !important;
        max-width: 90% !important;
        box-sizing: border-box;
    }

    img {
        max-width: 100% !important;
        height: auto !important;
    }

    table {
        width: 100% !important;
        border-collapse: collapse;
        font-size: 10pt;             /* shrink text a little */
        table-layout: auto !important;
    }

    table, th, td {
        /* border: 1px solid #000; */
        padding: 4px;
        word-break: break-word;      /* allow wrapping */
        white-space: normal;         /* wrap instead of overflow */
    }

    /* 🔑 This prevents cutoff by scaling table if still too wide */
    .print-area {
        transform: scale(0.95);
        transform-origin: top left;
    }
}



    </style>
</head>
<!-- <body onload="window.print()"> -->
    <body>

   <div class="print_header container">
        <div class="row">
            <div class="logo-header logo-dark col-lg-4 align-self-center">
                <a href="index.php"><img src="images/eec-logo.webp" alt="energyequipco-logo"></a>
            </div>
            <div class="contact-details col-lg-4 align-self-center">
                <span class="text1">
                    <strong>Energy Equipment Co. Inc.</strong><br>
                            206 N. Lanford Rd.<br>
                            Spartanburg, SC 29301 &nbsp;&nbsp;
                    <strong>Phone:</strong> 864-316-4028<br>
                    <strong>Fax:</strong> 866-931-1819 <br>
                    <strong>E-Mail:</strong> <a href="mailto:dave@energyequipco.com">dave@energyequipco.com</a> <br>
                    <strong>Website:</strong> www.energyequipco.com<br>
                </span>
            </div>

            <div class="col-lg-4 align-self-center no-print">
                <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="window.print();" role="button">
                    <i class="bi bi-printer"></i> Print
                </a>

                <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-sm btn-danger" role="button">
                    Back
                </a>
            </div>
        </div>
    </div>
	<!-- Header End -->



    <div class="boiler-details">
        <h2><?php echo strtoupper($type); ?> BOILERS</h2>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php if (!empty($boiler['image'])) { ?>
                                <img src="<?php echo $boiler['image']; ?>" alt="Boiler Image">
                    <?php } ?>
                </div>
                <div class="col-lg-8 ">
                    <p class="text-start"><?php echo $boiler['description']; ?></p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
            <div class="row">
    <table>
        <tr class="t-head">
            <th>Item #</th>
            <th>Year</th>
            <th>Horsepower</th>
            <th>Manufacturer</th>
            <th>Pressure</th>
            <th>Steam/Hot</th>
            <th>Burner</th>
            <th>Fuel(s)</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($items)) { ?>
        <tr>
            <td><?php echo $row['item_number']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['horsepower']; ?></td>
            <td><?php echo $row['manufacturer']; ?></td>
            <td><?php echo $row['pressure']; ?></td>
            <td><?php echo $row['steam_or_hot_water']; ?></td>
            <td><?php echo $row['burner']; ?></td>
            <td><?php echo $row['fuel']; ?></td>
        </tr>
        <?php } ?>
    </table>
        </div>
        </div>


</body>
</html>