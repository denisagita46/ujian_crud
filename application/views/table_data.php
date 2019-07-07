<head>
	<title>Tes Ujian</title>
	<style type="text/css">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-responsive.css'); ?>"/>
    <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.js');?>"></script>
	
<script type="text/javascript">
function confirm() {
var msg;
msg= "Apakah Yakin Akan Menghapus Data ? " ;
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}</script>

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	
	a.tambah {
	text-decoration:none;
	border: 1px solid #D0D0D0;
	padding:5px;
	}
	
	a.tambah:hover{
	font-weight:bold;
	}
	
	
	
	</style>
</head>
<body>

<div id="container">

	<div id="body">
	
	<p><span class="glyphicon glyphicon-plus"></span><a href="<?php echo base_url();?>index.php/dropdown/tambah/" class="tambah">&nbsp;&nbsp;Tambah Data Mockup&nbsp;&nbsp;</a>
    <p><a href="<?php echo base_url();?>index.php/laporanpdf/index/" target="_BLANK">REPORT</a></p>
	<center>
		<?php
		
		$desain_table=array('table_open'=>'<table border="2" width="100%" align="center">',
		'heading_cell_start'=>'<th bgcolor="#dedede">');
		$this->table->set_template($desain_table);
		$this->table->set_heading('No.','','Jenis Asuransi','Jenis Up','Jenis Benefit','Jenis Perusahaan','','');
		//$this->table->set_empty("&nbsp");
		$no=0;
		foreach($daftar_data as $baris_data) {
		$no++;
		$this->table->add_row(
		$no,
		$baris_data['f_name'],
		$baris_data['jenis_asuransi'],
		$baris_data['jenis_up'],
		$baris_data['jenis_benefit'],
		$baris_data['jenis_perusahaan'],
		'<center><a href="'.base_url().'index.php/dropdown/delete/' .$baris_data['emp_id'].'">'.'Delete'.'</a></center>',
		'<center><a href="'.base_url().'index.php/dropdown/edit/'.$baris_data['emp_id'].'">'.'Edit'.'</a></center>');
		
		}
		echo $this->table->generate();
		?>
		</div>

	<p class="footer">by deni sagita</p>
</div>
</center>
</body>
</html>