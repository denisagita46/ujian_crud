<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'REPORT DATA',0,1,'C');
      
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'',1,0);
        $pdf->Cell(70,6,'Jenis Asuransi',1,0);
        $pdf->Cell(27,6,'Jenis Up',1,0);
        $pdf->Cell(26,6,'Jenis Benefit',1,0);
		$pdf->Cell(25,6,'Jenis Perusahan',1,1);
        $pdf->SetFont('Arial','',10);
		
        $tb_transaksi = $this->db->get('tb_transaksi')->result();
        foreach ($tb_transaksi as $row){
            //$pdf->Cell(20,6,$row->emp_id,1,0);
            $pdf->Cell(20,6,$row->f_name,1,0);
			$pdf->Cell(70,6,$row->title_id,1,0);
			$pdf->Cell(27,6,$row->id,1,0);
			$pdf->Cell(26,6,$row->id_benefit,1,0);
			$pdf->Cell(25,6,$row->id_perusahaan,1,1);
        }
        $pdf->Output();
		
    }
}