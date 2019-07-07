<?php 
class Dropdown extends CI_Controller {

	public function __construct(){
	parent::__construct();
	$this->load->model('M_employees','',TRUE);
	 parent::__construct();
        $this->load->library('pdf');
	
	}

	public function index(){
	$data['daftar_data']=$this->M_employees->tampil();
	$this->load->view('table_data',$data);
	
	
	}
	
	public function tambah(){
	
	$this->form_validation->set_rules('nama','','required');
	
	
	//jenis UP
	$dd_jabatan = array();
	foreach ($this->M_employees->master_jabatan() as $data_jabatan) 
	{
	$dd_jabatan[$data_jabatan['title_id']] = $data_jabatan['jenis_up'];
	
	}
	$data['jabatan']=$dd_jabatan;
	
	
	//jenis asuransi
	
	$ok = array();
	foreach ($this->M_employees->master_asuransi() as $data_jabatan) 
	{
	$ok[$data_jabatan['id']] = $data_jabatan['jenis_asuransi'];
	
	}
	$data['asuransi']=$ok;
	
	// jenis benefit
	
	$uk = array();
	foreach ($this->M_employees->master_benefit() as $data_jabatan) 
	{
	$uk[$data_jabatan['id_benefit']] = $data_jabatan['jenis_benefit'];
	
	}
	$data['benefit']=$uk;
	
	// jenis perusahaan
	
	$des = array();
	foreach ($this->M_employees->master_perusahaan() as $data_jabatan) 
	{
	$des[$data_jabatan['id_perusahaan']] = $data_jabatan['jenis_perusahaan'];
	
	}
	$data['perusahaan']=$des;
	

	if($this->form_validation->run() == TRUE)
		{
			$this->M_employees->simpan();
			redirect(base_url(),'refresh');
		}
	$this->load->view('tambah_data',$data);
	}
	
	
	public function edit($emp_id){
	
	$this->form_validation->set_rules('nama','','required');
	
	
	//jenis UP
	$dd_jabatan = array();
	foreach ($this->M_employees->master_jabatan() as $data_jabatan) 
	{
	$dd_jabatan[$data_jabatan['title_id']] = $data_jabatan['jenis_up'];
	}
	$data['jabatan']=$dd_jabatan;
	
	
	//jenis asuransi
	
	$ok = array();
	foreach ($this->M_employees->master_asuransi() as $data_jabatan) 
	{
	$ok[$data_jabatan['id']] = $data_jabatan['jenis_asuransi'];
	
	}
	$data['asuransi']=$ok;
	
	// jenis benefit
	$uk = array();
	foreach ($this->M_employees->master_benefit() as $data_jabatan) 
	{
	$uk[$data_jabatan['id_benefit']] = $data_jabatan['jenis_benefit'];
	
	}
	$data['benefit']=$uk;
	
	// jenis perusahaan
	
	$des = array();
	foreach ($this->M_employees->master_perusahaan() as $data_jabatan) 
	{
	$des[$data_jabatan['id_perusahaan']] = $data_jabatan['jenis_perusahaan'];
	
	}
	$data['perusahaan']=$des;

	
	if($this->form_validation->run() == TRUE)
		{
			$this->M_employees->update();
			redirect(base_url(),'refresh');
		}
		
	$data['edit']=$this->M_employees->ambil_data($emp_id);	
	$this->load->view('edit_data',$data);
	}
	
	public function delete($emp_id){
	 
	 //echo $emp_id;
	 //$this->load->model('M_employees');
	 $data['delete']= $this->M_employees->deleteRecord($emp_id);
	
	 redirect(base_url(),'table_data'.$data);
	 //$this->load->view('table_data'.$data);
	 
	 }
	 
	 public function repot(){
	 $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
	 
	 }
	
	
	
	
	   
	}
	
	
	
?>