<?php
require('../fpdf186/fpdf.php'); // Include the FPDF library

// Function to generate and output the PDF certificate
function generateCertificate($babyName, $vaccinesList) {
  // Create a new PDF instance
  $pdf = new FPDF();
  $pdf->AddPage();

  // Set font and size
  $pdf->SetFont('Arial', 'B', 16);
  
  // Certificate content
  $pdf->Cell(0, 10, 'Certificate of Vaccination', 0, 1, 'C');
  $pdf->Ln(10);

  // Customize the certificate content with baby's name, date, or other details
  $certificateText = "This is to certify that $babyName has completed the vaccination process.";
  $pdf->MultiCell(0, 10, $certificateText, 0, 'C');
  
  // Add a section for displaying the list of vaccines taken by the baby
  $pdf->Ln(10);
  $pdf->SetFont('Arial', '', 12);
  $pdf->Cell(0, 10, 'List of Vaccines Taken:', 0, 1);
  $pdf->MultiCell(0, 10, $vaccinesList, 0, 'L');
  
  // Output the PDF
  $pdf->Output('Certificate.pdf', 'I'); // 'I' opens the PDF in the browser for printing or download
}

// Check if the request is for generating a certificate
if (isset($_GET['generate_certificate']) && isset($_GET['baby_name']) && isset($_GET['vaccines_list'])) {
  $babyName = $_GET['baby_name'];
  $vaccinesList = $_GET['vaccines_list'];
  generateCertificate($babyName, $vaccinesList);
}
?>