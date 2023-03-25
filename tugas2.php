<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan pemrosesan form</title>
</head>
<body>

<fieldset> 
    <legend>
        <font color="blod" size="5" face="calibri">
            FORM PEGAWAI
        </font>
    </legend>
    <!-- membuat Form -->
    <h1 style="text-align: center;">MENGISI DATA PEGAWAI</h1>
    <form method="POST">
		<table border="0" align="center" border="6" cellpadding="5" cellspacing="0" style="width: 37%;">
            <thead>
            <tr bgcolor="greenyellow">
                <th colspan="5">Form Register Produk</th>
            </tr>
            </thead>
        
            <tr>
				<td> <label> Nama </label> </td>
				<td>
					<input type="text" name="nama" placeholder="masukan nama">
				</td>
			</tr>
			<tr>
				<td> <label> Jabatan </label> </td>
				<td>
					<select name="jabatan">
						<option>---- Pilih Jabatan Anda ----</option>
						<option value="Manager">Manager</option>
						<option value="Asisten">Asisten</option>
						<option value="Kabag">Kabag</option>
						<option value="Staff">Staff</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label> Status </label></td>
				<td>
					<input type="radio" id="menikah" name="status" value="Menikah">
					<label for="menikah">Menikah</label>
					<input type="radio" id="belum" name="status" value="Belum" checked>
					<label for="belum">Belum Menikah</label><br>
				</td>
			</tr>
			<tr>
				<td><label> Jumlah Anak </label></td>
				<td>
					<input type="number" name="anak" placeholder="masukan jumlah anak">
				</td>
			</tr>
			<tr>
				<td><label> Agama </label></td>
				<td>
					<select name="agama">
						<option>---- Pilih Agama Anda ----</option>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Buddha">Buddha</option>
						<option value="Hinddu">Hinddu</option>
					</select>
				</td>
			</tr>
		
            <tfoot>
                <th colspan="5" bgcolor="greenyellow">
                    <button name="proses" type="submit">Simpan</button>
                </th>
            </tfoot>
		</table>     
	</form>
</fieldset>


<?php

    error_reporting(0);

    $nama = $_POST ['nama'];
	$jabatan = $_POST['jabatan'];
	$status = $_POST['status'];
	$anak = $_POST['anak'];
	$agama = $_POST['agama'];
	$tombol = $_POST['proses'];

	// inisialisasi variabel
	$gajip = 0;
	$tjabatan = 0;
	$tkeluarga = 0;
	$gajik = 0;
	$zakat = 0;
	$take = 0;


	// menghitung gaji pokok
	switch ($jabatan){
        case 'Manager' : $gajip = 20000000; break;
		case 'Asisten' : $gajip = 15000000; break;
        case 'Kabag' : $gajip = 10000000; break;
        case 'Staff' : $gajip = 4000000; break;
        default: $gajip = 0;
     }

	// menghitung tunjangan jabatan
	$tjabatan = 0.2 * $gajip;

	// menghitung tunjangan keluarga
	if ($status == "Menikah") {
	if ($anak <= 2) {
	$tkeluarga = 0.05 * $gajip;
	} elseif ($anak >= 3 && $anak <= 5) {
	$tkeluarga = 0.1 * $gajip;
	}
	}

	// menghitung gaji kotor
	$gajik = $gajip + $tjabatan + $tkeluarga;

	// menghitung zakat profesi
	if ($_POST['agama'] == "Islam" && $gajik >= 6000000) {
	$zakat = 0.025 * $gajik;
	}

	// menghitung take home pay
	$take = $gajik - $zakat;

     
    if(isset($tombol)){
?>



    <fieldset> 
        <legend>
            <font color="blod" size="5" face="calibri">
                DATA PEGAWAI
            </font>
        </legend>
        <table border="1" align="center" cellpadding="7" cellspacing="0" style="width: 50%;">
            <thead>
                <tr bgcolor="grey">
                    <th colspan="5">Hasil Data Keseluruhan Gaji Pegawai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label>Nama Pegawai</label></td>
                    <td> <?= $nama ?> </td>
                </tr>          
                <tr>
                    <td><label>Jabatan</label></td>
                    <td> <?= $jabatan ?> </td>
                </tr>
                <tr>
                    <td><label>Status</label></td>
                    <td> <?= $status ?> </td>
                </tr>
                <tr>
                    <td><label>Agama</label></td>
                    <td> <?= $agama ?> </td>
                </tr>
                <tr>
                    <td><label>Jumlah Anak</label></td>
                    <td> <?= $anak ?> </td>
                </tr>
                <tr>
                    <td><label>Tunjangan Jabatan</label></td>
                    <td> Rp. <?= $tjabatan ?> </td>
                </tr>
                <tr>
                    <td><label>Tunjangan Keluarga</label></td>
                    <td> Rp. <?= $tkeluarga ?> </td>
                </tr>
                <tr>
                    <td><label>Gaji Pokok</label></td>
                    <td> Rp. <?= $gajip ?> </td>
                </tr>
                <tr>
                    <td><label>Gaji Kotor</label></td>
                    <td> Rp. <?= $gajik ?> </td>
                </tr>
                <tr>
                    <td><label>Jumlah Zakat</label></td>
                    <td> Rp. <?= $zakat ?> </td>
                </tr>
                <tr>
                    <td><label>Take Home Pay</label></td>
                    <td> Rp. <?= $take ?> </td>
                </tr>
            </tbody>
            <tfoot>
                <th colspan="5" bgcolor="grey">
                </th>
            </tfoot>
        </table>
    </fieldset> 



<?php } ?>
    
</body>
</html>