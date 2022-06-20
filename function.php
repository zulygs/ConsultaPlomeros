<?php
	function pdf($inm_id_){
        require 'fpdf/fpdf.php';	
		include("conexion.php");
		$correo = "SELECT * from Correos where inm_id = $inm_id_";
        $ejecutacorreo = sqlsrv_query($con, $correo);
        while($fila = sqlsrv_fetch_array($ejecutacorreo)){
            $pdf = new FPDF('P','mm',array(216,140));
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true,5);
            $pdf->SetFont('Arial','',12);
            $mes_anio_ = 134;
            $inm_id_ = $fila["Inm_id"];
            $archivo_ = $inm_id_ ;
            $fecha = "";
            $filename="../CorreoPdf/temporales3/$archivo_.pdf";
  
        	switch ($mes_anio_) {
        		case 134:
            		$busqueda = "SELECT * from felectronica  where inm_Id = '$inm_id_'";
            		$buscar = sqlsrv_query($con, $busqueda);
            		break;
        	}
        	while($fila = sqlsrv_fetch_array($buscar)){
            	$mes_act = $fila['mesactual'];
            	$fec_pag = $fila['fechapago'];
            	$leyenda_ = $fila['leyenda'];
            	$mes_id = $fila['mes'];
            	$dte_ = $fila['dte'];
            	$clp_nombre_ = $fila['clp_Nombre'];
            	$vnit_ = $fila['vnit'];
            	$inm_IdGe = $fila['inm_IdGenerado'];
            	$coso_ = $fila['coso'];
            	$mes3_ = $fila{'mes3'};
            	$mes3s_ = $fila['mes3s'];
            	$lec_Anterior_ = $fila['lec_Anterior'];
            	$mes2_ = $fila['mes2'];
            	$mes2s_ = $fila['mes2s'];
            	$lec_Actual_ = $fila['lec_Actual'];
            	$mes1_ = $fila['mes1'];
            	$mes1s_ = $fila['mes1s'];
            	$lec_Consumo_ = $fila['lec_Consumo'];
            	$lec_VConsumo_ = $fila['lec_ValorConsumo'];
            	$lec_VExceso_ = $fila['lec_ValorExceso'];
            	$totalsinsaldoant_ = $fila['totalsinsaldoant'];
            	$saldoant_ = $fila['saldoant'];
            	$totalapagar_ = $fila['totalapagar'];
            	$letras_ = $fila['letras'];
            	$res = $fila['resolucion'];
        
        		switch ($mes_id) {
        			case 134:
            		$fecha = "11         AGOSTO         2019";
            		break;
    			}
        	}	
        	$pdf->Image('Factura Serie F.jpg', 1, 1, 140 ); 
	            $pdf->SetXy(38,7);
    	        $pdf->SetFont('Arial','',8);
            	$pdf->SetTextColor(255,0,0);
        	$pdf->MultiCell(30,3, utf8_decode("$mes_act"), 0,'C','');
            	$pdf->SetXy(105,9);
	            $pdf->SetFont('Arial','',12);
    	    $pdf->Cell(10,5 , "$fec_pag", 0,0,'L');	
                $pdf->SetFont('Arial','',8);
        	    $pdf->SetXy(1,15);
            	$pdf->Cell(150,5 , utf8_decode("$leyenda_"), 0,0,'C');		
            	$pdf->SetTextColor(0,0,0);	
            	$pdf->SetFillColor(255, 255, 255); 
            	$pdf->setxy(18, 19);
            	$pdf->Cell(20, 10, '', 0, 0, 'C', True); 
            	$pdf->SetFont('Arial','',10);
            	$pdf->SetXy(85,19);
            	$pdf->SetTextColor(0,0,0);	
        	$pdf->Cell(10,5 , "$fecha", 0,0,'L');
            	    $pdf->SetFont('Arial','B',13);
            	$pdf->SetXy(18,25);	
            	$pdf->SetTextColor(255,0,0);
        	$pdf->Cell(10,5 , "$dte_", 0,0,'L');
            	    $pdf->SetFont('Arial','',10);
            	$pdf->SetXy(30,58);	
            	$pdf->SetTextColor(0,0,0);
        	$pdf->Cell(10,5 , utf8_decode("$clp_nombre_"), 0,0,'L');
            	$pdf->SetXy(25,63);	
        	$pdf->Cell(10,5 , "$vnit_", 0,0,'L');
	            $pdf->SetXy(105,63);
    	        $pdf->SetTextColor(0,0,0);	
        	$pdf->Cell(10,5 , "$coso_", 0,'L');
            	$pdf->SetXy(35,67);	
            	$pdf->SetTextColor(255,0,0);
        	$pdf->Cell(10,5 , "$inm_IdGe", 0,0,'L');
            $pdf->SetTextColor(0,0,0);
            	$pdf->SetXy(18,78);	
        	$pdf->Cell(10,5 , "$mes3_", 0,0,'L');
            	$pdf->SetXy(68,78);	
        	$pdf->Cell(10,5 , "$mes3s_", 0,0,'L');	
	            $pdf->SetXy(118,78);	
    	    $pdf->Cell(10,5 , "$lec_Anterior_", 0,0,'L');
        	    $pdf->SetXy(18,85);	
        	$pdf->Cell(10,5 , "$mes2_", 0,0,'L');
            	$pdf->SetXy(68,85);	
        	$pdf->Cell(10,5 , "$mes2s_", 0,0,'L');	
            	$pdf->SetXy(118,85);	
        	$pdf->Cell(10,5 , "$lec_Actual_", 0,0,'L');
	            $pdf->SetXy(18,92);	
    	    $pdf->Cell(10,5 , "$mes1_", 0,0,'L');
            	$pdf->SetXy(68,92);	
        	$pdf->Cell(10,5 , "$mes1s_", 0,0,'L');	
	            $pdf->SetXy(118,92);	
    	    $pdf->Cell(10,5 , "$lec_Consumo_", 0,0,'L');
        	    $pdf->SetXy(28,103);	
        	$pdf->Cell(10,5 , number_format ("$lec_VConsumo_",2), 0,0,'R');
	            $pdf->SetXy(60,103);	
        	$pdf->Cell(10,5 , number_format ("$lec_VExceso_",2), 0,0,'R');
	            $pdf->SetXy(95,103);	
    	    $pdf->Cell(10,5 , number_format ("$totalsinsaldoant_",2), 0,0,'R');	
        	    $pdf->SetXy(120,103);	
        	$pdf->Cell(10,5 , number_format ("$saldoant_",2), 0,0,'R');	
            	$pdf->SetXy(38,116);	
        	$pdf->Cell(10,5 , number_format ("$totalapagar_",2), 0,0,'R');	
            	    $pdf->SetFont('Arial','',6);
            	$pdf->SetXy(50,116);	
        	$pdf->Cell(80,5 , "$letras_", 0,0,'R');	
            	     $pdf->SetFont('Arial','',6);
            	$pdf->SetXy(26,150);	
  	        $pdf->MultiCell(100,3 , utf8_decode("$res"), 0,'C','');	
                	$pdf->SetFont('Arial','',9);
                	$pdf->SetFillColor(255, 255, 255); 
                	$pdf->setxy(20, 173);
                	$pdf->Cell(20, 10, '', 0, 0, 'C', True); 
            	$pdf->SetXy(90,173);	
        	$pdf->Cell(10,5 , "$fecha", 0,0,'L');
            	$pdf->SetXy(28,179);	
        	$pdf->Cell(10,5 , "$dte_", 0,0,'L');
	            $pdf->SetXy(35,183);	
    	    $pdf->Cell(10,5 , utf8_decode("$clp_nombre_"), 0,0,'L');
        	    $pdf->SetXy(35,187);	
        	$pdf->Cell(10,5 , "$vnit_", 0,0,'L');
            	$pdf->SetXy(105,187);	
        	$pdf->Cell(10,5 , "$coso_", 0,'L');
	            $pdf->SetXy(35,191);	
            	$pdf->SetTextColor(255,0,0);
        	$pdf->Cell(10,5 , "$inm_IdGe", 0,0,'L');
	            $pdf->SetXy(38,204);	
    	        $pdf->SetTextColor(0,0,0);
	        $pdf->Cell(10,5 , number_format ("$totalapagar_",2), 0,0,'R');	
    	            $pdf->SetFont('Arial','',6);
            	$pdf->SetXy(50,204);	
        	$pdf->Cell(80,5 , "$letras_", 0,0,'R');	

        $pdf->Output($filename,'F');

	}
}

?>