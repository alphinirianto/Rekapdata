<style>
		/* The alert message box */
	.alert {
	padding: 20px;
	background-color: #f44336; /* Red */
	color: white;
	margin-bottom: 15px;
	}

	/* The close button */
	.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
	}

	/* When moving the mouse over the close button */
	.closebtn:hover {
	color: black;
	}
</style>
	<!-- Content -->
	<div style="padding: 0 15px;">
		

		<h3>Form Import Data</h3>
		<hr>

		<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
		<form method="post" action="" enctype="multipart/form-data">
			<a href="assets/masteruser.xlsx" class="btn btn-primary">
				<span class="glyphicon glyphicon-download"></span>
				Download Template Plan
			</a>
			<br><br>
			<input type="file" name="file" class="pull-left">
			<button type="submit" name="preview" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-eye-open"></span> Preview
			</button>
		</form>

		<hr>

		<!-- Buat Preview Data -->
		<?php
		// Jika user telah mengklik tombol Preview
		if(isset($_POST['preview'])){	
			$nama_file_baru = 'data.xlsx';

			// Cek apakah terdapat file data.xlsx pada folder tmp
			if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
				unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
			$tmp_file = $_FILES['file']['tmp_name'];

			// Cek apakah file yang diupload adalah file Excel >2007 (.xlsx)
			if($ext == "xlsx"){
				// Upload file yang dipilih ke folder tmp
				// dan rename file tersebut menjadi data{ip_address}.xlsx
				// {ip_address} diganti jadi ip address user yang ada di variabel $ip
				// Contoh nama file setelah di rename : data127.0.0.1.xlsx
				move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

				// Load librari PHPExcel nya
				require_once 'assets/PHPExcel3/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true , true, true,true, true, true, true, true, true, true,true);
				// Buat sebuah tag form untuk proses import data ke database
				?>
				<form onsubmit="return validasi_input(this)" action="page/user/import_rekapdata.php" name="form_plan" id="form_plan" method="post"  enctype="multipart/form-data">
				<?php
				echo "<table class='table table-bordered table-striped'>
                        <tr style='background-color:yellow;'>
                        <th>UNIT</th>
                        <th>EXFACTORY DATE</th>
                        <th>WEEK NUMBER</th>
                        <th>BUYER</th>
                        <th>ON</th>
                        <th>STYLE</th>
                        <th>DESCRIPTION PRODUCTS</th>
                        <th>PO</th>
                        <th>COLOR</th>
                        <th>COUNTRY</th>
                        <th>SIZE</th>
                        <th>QTYORDER</th>     
                        </tr>";

				$numrow = 1;
				$kosong = 0;
				foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
					// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get

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
					if($un == "" && $ex == "" && $we == "" && $bu  == "" && $on == "" && $st == "" && $de == "" && $po  == ""&& $cor == "" && $cou == "" && $siz == "" && $qty  == "")
						continue;
					// Cek $numrow apakah lebih dari 1

					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					$sum = '0';
					if($numrow > 1){

                        $un_td =  ( ! empty($un))? "" : " style='background: #E07171;'";
                        $ex_td =  ( ! empty($ex))? "" : " style='background: #E07171;'";
                        $we_td =  ( ! empty($we))? "" : " style='background: #E07171;'";
                        $bu_td =  ( ! empty($bu))? "" : " style='background: #E07171;'";
                        $on_td =  ( ! empty($on))? "" : " style='background: #E07171;'";
                        $st_td =  ( ! empty($st))? "" : " style='background: #E07171;'";
                        $de_td =  ( ! empty($de))? "" : " style='background: #E07171;'";
                        $po_td =  ( ! empty($po))? "" : " style='background: #E07171;'";
                        $cor_td =  ( ! empty($cor))? "" : " style='background: #E07171;'";
                        $cou_td =  ( ! empty($cou))? "" : " style='background: #E07171;'";
                        $siz_td =  ( ! empty($siz))? "" : " style='background: #E07171;'";
                        $qty_td =  ( ! empty($qty))? "" : " style='background: #E07171;'";
							

							// Jika salah satu data ada yang kosong
							if($un == "" or $ex == "" or $we == "" or $bu == "" or $on == "" or $st == "" or $de == "" or $po == "" && $cor == "" or $cou == "" or $siz == "" or $qty == "")

							{
								$kosong++; // Tambah 1 variabel $kosong
						}

						echo "<tr>";

                                echo "<td".$un_id.">".$un."</td>";
                                echo "<td".$ex_id.">".$ex."</td>";
                                echo "<td".$we_id.">".$we."</td>";
                                echo "<td".$bu_id.">".$bu."</td>";
                                echo "<td".$on_id.">".$on."</td>";
                                echo "<td".$st_id.">".$st."</td>";
                                echo "<td".$de_id.">".$de."</td>";
                                echo "<td".$po_id.">".$po."</td>";
                                echo "<td".$cor_id.">".$cor."</td>";
                                echo "<td".$cou_id.">".$cou."</td>";
                                echo "<td".$siz_id.">".$siz."</td>";
                                echo "<td".$qty_id.">".$qty."</td>";

						echo "</tr>";

					}
					$numrow++; // Tambah 1 setiap kali looping
			
				}

				?>
				</table>
			
				<?php

				// Cek apakah variabel kosong lebih dari 1
				// Jika lebih dari 1, berarti ada data yang masih kosong
				if($kosong > 1){
				?>
					<script>
					$(document).ready(function(){
						// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
						$("#jumlah_kosong").html('<?php echo $kosong; ?>');

						$("#kosong").show(); // Munculkan alert validasi kosong
					});
					</script>
				<?php
				}else{ // Jika semua data sudah diisi
					echo "<hr>";
				}
				?>

                <button type="submit" name='submit' id="submit" value="submit"  class="btn btn-danger btn-lg"><span class='glyphicon glyphicon-upload'> Import</button>			
				<?php  
                echo "</form>";
			}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
				// Munculkan pesan validasi
				echo "<div class='alert alert-danger'>
				Hanya File Excel 2007 (.xlsx) yang diperbolehkan
				</div>";
			}
		}
		?>

	</div>

