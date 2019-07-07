<head>
	<title>Update Data</title>
	<style type="text/css">

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
	
	p.tombol_tambah a{
	text-decoration:none;
	border:1px solid #bbb000;
	padding : 5px;
	border-radius:5px;
	}
	
	p.tombol_tambah a:hover{
	background-color:#ddd000;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1></h1>
	<div id="body">
	<h2>Update Data</h2>
	<p class="tombol_tambah"><a href="javascript:history.back();">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a></p>
    <form method="POST" action="<?php echo base_url();?>dropdown/edit/<?php echo $this->uri->segment(3);?>">
	<?php
	$seting_table=array('table_open'=>'<table border="0" align="center">');
	$this->table->set_template($seting_table);
	
	$nama=array('name'=>'nama','size'=>'20','readonly'=>'readonly');
	$emp=array('name'=>'emp_id','type'=>'hidden');

	$this->table->add_row('','',form_input($nama,$edit['f_name']).form_input($emp,$edit['emp_id']));
	
    $this->table->add_row('Jenis Asuransi',':',form_dropdown('jenis_asuransi',$asuransi,$edit['id']));
	$this->table->add_row('Jenis UP',':',form_dropdown('jenis_up',$jabatan,$edit['title_id']));
	
	$this->table->add_row('Jenis Benefit',':',form_dropdown('jenis_benefit',$benefit,$edit['id_benefit']));
	$this->table->add_row('Jenis Perusahaan',':',form_dropdown('jenis_perusahaan',$perusahaan,$edit['id_perusahaan']));

	$update=array('name'=>'submit','value'=>'Update Data');
	$this->table->add_row(form_submit($update));	
	echo $this->table->generate();
	?>
	</form>
	</div>

	<p class="footer">By Deni Sagita</p>
</div>

</body>
<?php
	if(validation_errors()){
	echo '<script>alert("Nama tidak boleh dikosongkan !");</script>'; 
	}
?>
</html>