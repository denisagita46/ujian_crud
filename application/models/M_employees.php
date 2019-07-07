<?php 
class M_employees extends CI_Model {

	public function __construct(){
	parent::__construct();
	}

	public function tampil(){
	$this->db->select('tb_transaksi.emp_id,tb_transaksi.f_name,
	jenis_up.jenis_up,jenis_asuransi.jenis_asuransi,jenis_benefit.jenis_benefit,jenis_perusahaan.jenis_perusahaan');
	$this->db->join('jenis_up','tb_transaksi.title_id=jenis_up.title_id');
	$this->db->join('jenis_asuransi','tb_transaksi.id=jenis_asuransi.id');
	$this->db->join('jenis_benefit','tb_transaksi.id_benefit=jenis_benefit.id_benefit');
	$this->db->join('jenis_perusahaan','tb_transaksi.id_perusahaan=jenis_perusahaan.id_perusahaan');
	$sql=$this->db->get('tb_transaksi');
	if($sql->num_rows()>0){
			return $sql->result_array();
		}
	}
	
	public function ambil_data($emp_id){
	$this->db->where('emp_id',$emp_id);
	$sql_employee=$this->db->get('tb_transaksi');
	if($sql_employee->num_rows()>0){
			return $sql_employee->row_array();
		}
	}

	public function simpan(){
	$data_employee=array(
	'f_name'=>$this->input->post('nama'),
	'title_id'=>$this->input->post('jenis_up'),
	'id'=>$this->input->post('jenis_asuransi'),
	'id_benefit'=>$this->input->post('jenis_benefit'),
	'id_perusahaan'=>$this->input->post('jenis_perusahaan'),

	
	);
	$this->db->insert('tb_transaksi',$data_employee);
	}
	
	public function update(){
	$data_employee=array(
	'f_name'=>$this->input->post('nama'),
	'title_id'=>$this->input->post('jenis_up'),
	'id'=>$this->input->post('jenis_asuransi'),
	'id_benefit'=>$this->input->post('jenis_benefit'),
	'id_perusahaan'=>$this->input->post('jenis_perusahaan'),
	
	
	);
	$this->db->where('emp_id',$this->input->post('emp_id'));
	$this->db->update('tb_transaksi',$data_employee);
	}
	
	
	public function master_jabatan(){
	$this->db->order_by('title_id');
	$sql_jabatan=$this->db->get('jenis_up');
	if($sql_jabatan->num_rows()>0){
		return $sql_jabatan->result_array();
		}
	}
	
	public function master_asuransi(){
	$this->db->order_by('id');
	$ok=$this->db->get('jenis_asuransi');
	if($ok->num_rows()>0){
		return $ok->result_array();
		}
	}
	
	public function master_benefit(){
	$this->db->order_by('id_benefit');
	$uk=$this->db->get('jenis_benefit');
	if($uk->num_rows()>0){
		return $uk->result_array();
		}
	}
	
	
	public function master_perusahaan(){
	$this->db->order_by('id_perusahaan');
	$des=$this->db->get('jenis_perusahaan');
	if($des->num_rows()>0){
		return $des->result_array();
		}
	}
	
   public function deleteRecord($emp_id){
      $query =$this->db->delete('tb_transaksi', array('emp_id' => $emp_id));
       return $query;
   }
	 
   
    
}
	
	
?>