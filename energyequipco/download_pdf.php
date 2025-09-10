<?php
require __DIR__ . '/fpdf/fpdf.php';
include('inc/head.php');
// include only backend/db files that do NOT echo HTML

$boilerTypes = [
    'cleaver'   => ['boiler_details', 'cleaver_table'],
    'other'     => ['other_boilers', 'other_table'],
    'superior'  => ['superior_boiler', 'superior_table'],
    'johnston'  => ['johnston_boiler', 'johnston_table'],
    'hurst'     => ['hurst_boiler', 'hurst_table']
];

$type = isset($_GET['type']) ? $_GET['type'] : '';

if (!array_key_exists($type, $boilerTypes)) {
    die("Invalid boiler type selected.");
}

list($boilerTable, $itemTable) = $boilerTypes[$type];

// ⚠️ Make sure $con is defined (DB connection)
$boiler = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $boilerTable ORDER BY id DESC LIMIT 1"));
$items  = mysqli_query($con, "SELECT * FROM $itemTable ORDER BY id DESC");

$pdf = new FPDF();
$pdf->AddPage();



// Add Logo (top left)
$pdf->Image('images/eec-logo.png', 5, 5, 50); // (file, x, y, width)

// Move to the right of the logo
$pdf->SetXY(60, 12); 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,6,"Energy Equipment Co. Inc.",0,1);

// Contact details
$pdf->SetFont('Arial','',10);
$pdf->SetX(60);
$pdf->MultiCell(0,5,
    "206 N. Lanford Rd.\n".
    "Spartanburg, SC 29301\n".
    "Phone: 864-316-4028\n".
    "Fax: 866-931-1819\n".
    "E-Mail: dave@energyequipco.com\n".
    "Website: www.energyequipco.com"
);

// Add some spacing before the main content
$pdf->Ln(10);


// Title
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,strtoupper($type).' BOILERS',0,1,'C');
$pdf->Ln(5);

// Boiler image (if available)
if (!empty($boiler['image'])) {
    // Place image centered, width 60mm, auto height
    $pdf->Image($boiler['image'], ($pdf->GetPageWidth()-100)/2, $pdf->GetY(), 100);
    $pdf->Ln(90); // move cursor down after image
}

// Boiler description
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,7,$boiler['description']);
$pdf->Ln(10);

// Table header
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,10,"Item #",1);
$pdf->Cell(15,10,"Year",1);
$pdf->Cell(25,10,"Horsepower",1);
$pdf->Cell(30,10,"Manufacturer",1);
$pdf->Cell(20,10,"Pressure",1);
$pdf->Cell(20,10,"Steam/Hot",1);
$pdf->Cell(40,10,"Burner",1);
$pdf->Cell(25,10,"Fuel",1);
$pdf->Ln();

// Table rows
$pdf->SetFont('Arial','',8);
while($row = mysqli_fetch_assoc($items)) {
    $pdf->Cell(15,8,$row['item_number'],1);
    $pdf->Cell(15,8,$row['year'],1);
    $pdf->Cell(25,8,$row['horsepower'],1);
    $pdf->Cell(30,8,$row['manufacturer'],1);
    $pdf->Cell(20,8,$row['pressure'],1);
    $pdf->Cell(20,8,$row['steam_or_hot_water'],1);
    $pdf->Cell(40,8,$row['burner'],1);
    $pdf->Cell(25,8,$row['fuel'],1);
    $pdf->Ln();
}

// Clear buffer to avoid "already sent" error
if (ob_get_length()) {
    ob_end_clean();
}

// Final output
$pdf->Output("D", $type."_boilers.pdf");
?>
