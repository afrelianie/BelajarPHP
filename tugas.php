
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jajar Genjang</title>
</head>
<body>
	<h1>Menghitung Luas dan Keliling Jajar Genjang</h1>
	<form method="post" action="">
          <table>
               <tr>
                    <td>Alas</td>
                    <td>
                         <input type="text" name="alas" require>
                    </td>
               </tr>
               <tr>
                    <td>Tinggi</td>
                    <td>
                         <input type="text" name="tinggi" require>
                    </td>
               </tr>
               <tr>
                    <td>Sisi Miring</td>
                    <td>
                         <input type="text" name="sisi" require>
                    </td>
               </tr>
               <tr>
                    <td>
                         <input type="submit" name="submit" value="Hitung">
                    </td>
               </tr>
          </table>
	</form>
	<?php
		if(isset($_POST['submit'])){
			$alas = $_POST['alas'];
			$tinggi = $_POST['tinggi'];
			$sisi = $_POST['sisi'];
			if(empty($alas) || empty($tinggi) || empty($sisi)){
				echo "<br><strong style='color:red;'>Error: Mohon isi semua data!</strong>";
			}
			else {
				$luas = $alas * $tinggi;
				$keliling = 2 * ($alas + $sisi);
				echo "<br>Luas Jajar Genjang adalah: " . $luas;
				echo "<br>Keliling Jajar Genjang adalah: " . $keliling;
			}
		}
	?>
</body>
</html>
