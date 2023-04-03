<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Perhitungan Gaji Karyawan</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body style="background-color: greenyellow; padding: 50px">
	<h1>Perhitungan Gaji Karyawan</h1>
	<form method="post" action="index.php">
		Golongan :
		<select name="golongan">
			<option value="1">Golongan 1</option>
			<option value="2">Golongan 2</option>
			<option value="3">Golongan 3</option>
		</select><br><br>
		Status Pernikahan :
		<input type="radio" name="status" value="belum_kawin">Belum Kawin
		<input type="radio" name="status" value="sudah_kawin">Sudah Kawin<br><br>
		Jumlah Anak :
		<input type="text" name="jumlah_anak"><br><br>
		<input type="submit" name="submit" value="Hitung Gaji">
        <div class="form-group">
            <h1 class="result">Result</h1>
			<?php
			error_reporting(0); 
			if(isset($_POST['submit'])){
				$golongan = $_POST['golongan'];
				$status = $_POST['status'];
				$jumlah_anak = $_POST['jumlah_anak'];
	
				switch ($golongan) {
					case '1': 
						$gaji_pokok = 1000000;
						$pajak = 0;
						break;
					
					case '2':
						$gaji_pokok = 2000000;
						$pajak = 2.5;
						break;
	
					case '3':
						$gaji_pokok = 3000000;
						$pajak = 5;
						break;
				}
	
				if($status == "sudah_kawin"){
					$tunjangan_keluarga = 200000;
					if($jumlah_anak > 3){
						$tunjangan_anak = 300000;
					} else {
						$tunjangan_anak = $jumlah_anak * 100000;
					}
					$tunjangan_profesi = (date('Y') - 2021) * 50000;
					$total_tunjangan = $tunjangan_keluarga + $tunjangan_anak + $tunjangan_profesi;
				} else {
					$total_tunjangan = (date('Y') - 2021) * 50000;
				}
	
				$gaji_kotor = $gaji_pokok + $total_tunjangan;
				$pajak = $pajak / 100 * $gaji_kotor;
				$gaji_bersih = $gaji_kotor - $pajak;
	
		}
			?>

	
	<table class="table" style="height: 35px; width: 80px; border:10px">
	<thead class="table-light">
		<tr>
		<th scope="col">Gaji Pokok</th>
		<th scope="col">Tunjangan</th>
		<th scope="col">Gaji Kotor</th>
		<th scope="col">Pajak</th>
		<th scope="col">Gaji Bersih</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td><?php echo number_format($gaji_pokok)?></td>
		<td><?php echo number_format($total_tunjangan)?></td>
		<td><?php echo number_format($gaji_kotor)?></td>
		<td><?php echo number_format($pajak)?></td>
		<td><?php echo number_format($gaji_bersih)?></td>
		</tr>
	</tbody>
	</table>
        </div>

	</form>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</body>
</html>
