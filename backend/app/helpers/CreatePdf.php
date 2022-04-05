<?php
    
    // Create pdf with the Reservation info
    function pdfReservation($data) {
        require APPROOT.'/fpdf/fpdf.php';
        $pdf = new FPDF();

        $lineBreak = 15.81;
		$lb = 17.11;
		$Sujet = $data['Sujet'];
		$date = $data['date'];
	  	$creneau = $data['creneau'];
        $image1 = URLROOT.'/public/img/signature.png';

		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,10,"Ticket for Train Trip",1,1,'C');
		$pdf->Ln($lineBreak);
		// $pdf->Write(5,'Ticket No' . $data['trip_id'] . ' Details','C');
		$pdf->SetFont('Arial','',10);
		$pdf->Ln($lineBreak);
		$pdf->Cell(90,10,"SUjet de reservation :",1,0,'C');
		$pdf->Cell(90,10,$Sujet,1,1,'C');
		$pdf->Cell(90,10,"date de rondiveur :",1,0,'C');
		$pdf->Cell(90,10,$date,1,1,'C');
		$pdf->Cell(90,10,"creneau :",1,0,'C');
		$pdf->Cell(90,10,$creneau,1,1,'C');        
		$pdf->Ln($lineBreak);
		$pdf->SetFont('Arial','b',12);
		// $pdf->Write(5,'Date and Time: '. (isset($data['reservation_date']) ? $data['reservation_date'] : date("Y-m-d h:i:s")));
		$pdf->Ln($lineBreak);
        $pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
		$pdf->Ln($lb);
		$pdf->Write(5,'Authorized Signature');

        $fill = "$data[creneau]_RDV".'.pdf';
		$pdf->Output($fill, 'D');
			
    }

?>