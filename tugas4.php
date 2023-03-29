<?php
$ar_prodi = ["SI" => "Sistem Informasi", "TI" => "Teknik Informatika", "ILKOM" => "Ilmu Komputer", "TE" => "Teknik Elektro"];
$ar_skiil = ["HTML" => 10, "CSS" => 10, "Javascript" => 20, "RWD Bootstrap" => 20, "PHP" => 30, "MySQL" => 30, "Laravel" => 40];
$domisili = ["Jakarta", "Bandung", "Bekasi", "Malang", "Kalbar", "Lainnya"];

function hitung_skor_skill($skill){
    $ar_skiil = ["HTML" => 10, "CSS" => 10, "Javascript" => 20, "RWD Bootstrap" => 20, "PHP" => 30, "MySQL" => 30, "Laravel" => 40];
    $total_nilai = 0;

    foreach ($skill as $s) {
    $skor = $total_nilai += $ar_skiil[$s];
    if($skor >= 100 && $skor <= 160) $kategori = 'Sangat Baik';
    else if ($skor >= 60 && $skor < 100) $kategori = 'Baik';
    else if ($skor >= 40 && $skor < 60) $kategori = 'Cukup';
    else if ($skor >= 0 && $skor < 40) $kategori = 'Kurang';
    else if ($skor == 0) $kategori = 'Tidak Memadai';
    else $kategori = '';
}

    return ['skor' => $skor, 'kategori' => $kategori];
}

?>

<fieldset>
    <legend>
          <font color="blod" size="5" face="calibri">
               Form Registrasi Kelompok Belajar
          </font>
    </legend>

    <!-- membuat Form -->
    <h1 style="text-align: center;">MENGISI DATA SISWA</h1>
    <form action="" method="POST">
          <table border="0" align="center" border="6" cellpadding="5" cellspacing="0" style="width: 37%;">
               <thead>
                    <tr bgcolor="greenblue">
                         <th colspan="5">Form Register</th>
                    </tr>
               </thead>
               <tbody>
               
                    <tr>
                         <td>NIM :</td>
                         <td>
                              <input type="number" name="nim" placeholder="masukkan nim anda">
                         </td>
                    </tr>
                    <tr>
                         <td>Nama :</td>
                         <td>
                              <input type="text" name="nama" placeholder="masukan nama">
                         </td>
                    </tr>
                    <tr>
                         <td>Email :</td>
                         <td>
                              <input type="email" name="email" placeholder="masukan email">
                         </td>
                    </tr>
                    <tr>
                         <td>Jenis Kelamin :</td>
                         <td>
                              <input type="radio" name="jk" value="Laki-laki"> Laki-laki &nbsp;
                              <input type="radio" name="jk" value="Perempuan"> Perempuan
                         </td>
                    </tr>
                    <tr>
                         <td>Program Studi :</td>
                         <td>
                         <select name="prodi">
                              <option selected disabled>---- Pilih Program Studi ----</option>
                              <?php foreach($ar_prodi as $prodi => $v){ ?>
                                   <option value="<?= $prodi ?>"> <?= $v ?> </option>
                              <?php } ?>
                         </select>
                         </td>
                    </tr>
                    <tr>
                         <td>Skill Programming :</td>
                         <td>
                         <?php foreach ($ar_skiil as $skill => $s){ ?>
                              <input type="checkbox" name="skill[]" value="<?= $skill ?>"> <?= $skill ?>
                         <?php } ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Domisili :</td>
                         <td>
                         <select name="domisili">
                              <option selected disabled>---- Pilih Tempat Tinggal ----</option>
                              <?php foreach ($domisili as $d){ ?>
                                   <option value="<?= $d ?>"> <?= $d ?> </option>
                              <?php } ?>
                         </select>
                         </td>
                    </tr>
                    <tfoot>
                         <th colspan="5" bgcolor="greenblue">
                              <button name="proses">Simpan</button>
                         </th>
                    </tfoot>      
               </tbody>
          </table>
     </form>
</fieldset>

 <?php
 
 error_reporting(0);
 
 if (isset($_POST['proses'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jk = $_POST['jk'];
    $prodi = $_POST['prodi'];
    $skill = $_POST['skill'];
    $domisili = $_POST['domisili'];

    
    $skor_skill = hitung_skor_skill($skill);
    $skor = $skor_skill['skor'];
    $kategori = $skor_skill['kategori'];
    }

 ?>




<fieldset> 
        <legend>
            <font color="blod" size="5" face="calibri">
                DATA MAHASISWA
            </font>
        </legend>
        <table border="1" align="center" cellpadding="7" cellspacing="0" style="width: 50%;">
            <thead>
                <tr bgcolor="grey">
                    <th colspan="5">Hasil Data Mahasiswa</th>
                </tr>
            </thead>
            <tbody>
                        
                <tr>
                    <td><label>NIM</label></td>
                    <td> <?= $nim ?> </td>
                </tr>
                <tr>
                    <td><label>Nama</label></td>
                    <td> <?= $nama ?> </td>
                </tr> 
                <tr>
                    <td><label>Jenis Kelamin</label></td>
                    <td> <?= $jk ?> </td>
                </tr>
                <tr>
                    <td><label>Program Studi</label></td>
                    <td> <?= $prodi ?> </td>
                </tr>
                <tr>
                    <td><label>Skill</label></td>
                    <td> <?php 
                         foreach($skill as $s){ ?>
                         <?= $s ?> ,
                         <?php } ?> 
                    </td>
                </tr>
                <tr>
                    <td><label>Skor</label></td>
                    <td><?= $skor ?> </td>
                </tr>
                <tr>
                    <td><label>Kategori Skill</label></td>
                    <td> <?= $kategori ?> </td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td> <?= $email ?> </td>
                </tr>
                <tr>
                    <td><label>Tempat Tinggal</label></td>
                    <td> <?= $domisili ?> </td>
                </tr>
               
            </tbody>
            <tfoot>
                <th colspan="5" bgcolor="grey">
                </th>
            </tfoot>
        </table>
    </fieldset>
