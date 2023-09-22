<?php

function generateCertificate() {
  // Get the baby name from the button's value
  $babyName = $_POST["babyName"];

  // Generate the certificate content
  require_once 'fpdf.php';
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 16);
  $pdf->Cell(100, 10, 'Vaccination Certificate', 0, 0, 'C');
  $pdf->Ln(20);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(100, 10, 'This certificate is to certify that <strong>' . $babyName . '</strong> has completed the recommended vaccination schedule.', 0, 0, 'C');

  // Display the certificate to the user
  $pdf->Output();
}

?>
