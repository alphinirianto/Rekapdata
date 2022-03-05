<?php
		global $mysqli;
			$host="localhost";
			$user="root";
			$pass="";
			$database="dbadminlte";
			$mysqli=new mysqli($host,$user,$pass,$database);
			if (mysqli_connect_errno()) {
			trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
        }
		if(isset($_POST['submit'])){ 

			// Jika user mengklik tombol Import
			$nama_file_baru = 'data'.$iden.'.xlsx';
		
			// Load librari PHPExcel nya
			require_once '../..\assets\PHPExcel3\PHPExcel.php';
		
			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('../..\tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
			$numrow = 1;
			foreach($sheet as $row){
				// Ambil data pada excel sesuai Kolom
					$un = $row['A']; 
					$ex = $row['B']; 
					$we = $row['C']; 
					$bu = $row['D']; 
                    $on = $row['E']; 
					$st = $row['F']; 
					$de = $row['G']; 
					$po = $row['H'];
                    $cor = $row['I']; 
					$cou = $row['J']; 
					$siz = $row['K']; 
					$qty = $row['L']; 
				
					// Cek jika semua data tidak diisi
					if($un == "" && $ex == "" && $we == "" && $bu  == "" && $on == "" && $st == "" && $de == "" && $po  == "" && $cor == "" && $cou == "" && $siz == "" && $qty  == "")
						continue;

				if($numrow > 1){
					// Buat query Insert
					$mysqli->query( "INSERT INTO datarekap  
					   VALUES('".$un."','".$ex."','".$we."','".$bu."','".$on."','".$st."','".$de."','".$po."','".$cor."','".$cou."','".$siz."','".$qty."')");
}
				$numrow++; 
			}
		}?>
  <script>alert('Import Data Success')</script>";
  <script type='text/javascript'> document.location = '\../../index.php'; </script>"; 
