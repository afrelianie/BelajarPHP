<?php
$m1 = ['NIM'=>'3042020046', 'Nama'=>'Anggi', 'Nilai'=>80]; 
$m2 = ['NIM'=>'3042020011', 'Nama'=>'Angga', 'Nilai'=>70]; 
$m3 = ['NIM'=>'3042020033', 'Nama'=>'Ani', 'Nilai'=>50]; 
$m4 = ['NIM'=>'3042020022', 'Nama'=>'Andi', 'Nilai'=>40]; 
$m5 = ['NIM'=>'3042020034', 'Nama'=>'Aldy', 'Nilai'=>90]; 
$m6 = ['NIM'=>'3042020055', 'Nama'=>'Ayu', 'Nilai'=>75]; 
$m7 = ['NIM'=>'3042020013', 'Nama'=>'Anna', 'Nilai'=>30];
$m8 = ['NIM'=>'3042020028', 'Nama'=>'Ami', 'Nilai'=>85];

//array asossiative
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8]; 
$ar_judul = ['No', 'NIM', 'Nama','Nilai','Status','Grade','Predikat'];

//fungsi sederhana
$jumlah_data = count($mahasiswa);
$jml_nilai = array_column($mahasiswa, 'Nilai');
$total_nilai = array_sum($jml_nilai);
$max_nilai = max($jml_nilai);
$min_nilai = min($jml_nilai);
$rata_rata = $total_nilai / $jumlah_data;
$keterangan = [
     'Jumlah Data ' => $jumlah_data,
     'Total nilai ' => $total_nilai,
     'Nilai Tertinggi ' =>$max_nilai,
     'Nilai Terendah' =>$min_nilai,
     'Nilai Rata-Rata' =>$rata_rata
]

?>




<fieldset> 
        <legend>
            <font color="blod" size="5" face="calibri">
                Data Mahasiswa
            </font>
        </legend>

     <table border="1" align="center" cellpadding="9" cellspacing="0" style="width: 50%;">
          <thead>
               <tr bgcolor="gray">
               <?php
                    foreach ($ar_judul as $j){
                    ?>
                    <th> <?= $j ?></th>
                    <?php } ?>
               </tr>
          </thead>

          <tbody>
               <?php
               $no =1;
               foreach ($mahasiswa as $mhs){
                    $ket = ($mhs ['Nilai']>= 60) ? 'Lulus' : 'Tidak Lulus';
                    //grade
                    if($mhs ['Nilai']>= 80 && $mhs['Nilai'] <= 100) $grade = 'A';
                    else if ($mhs ['Nilai']>= 75 && $mhs['Nilai'] < 80) $grade = 'B';
                    else if ($mhs ['Nilai']>= 60 && $mhs['Nilai'] < 74) $grade = 'C';
                    else if ($mhs ['Nilai']>= 30 && $mhs['Nilai'] < 55) $grade = 'D';
                    else if ($mhs ['Nilai']>= 0 && $mhs['Nilai'] < 29) $grade = 'E';
                    else $grade = '';

                    switch ($grade){
                         case "A" : $predikat = "memuaskan"; break;
                         case "B" : $predikat = "Bagus"; break;
                         case "C" : $predikat = "Cukup"; break;
                         case "D" : $predikat = "Kurang"; break;
                         case "E" : $predikat = "Buruk"; break;
                         default: $predikat ="";
                         }
                    
                    $warna = $no % 2 == 1 ? 'greenblue' : 'greenyellow';
                    ?>
                    <tr bgcolor="<?= $warna; ?>">
                         <td><?= $no ?></td>
                         <td><?= $mhs['NIM'] ?></td>
                         <td><?= $mhs['Nama'] ?></td>
                         <td><?= $mhs['Nilai'] ?></td>
                         <td><?= $ket ?></td>
                         <td><?= $grade ?></td>
                         <td><?= $predikat ?></td>
                    </tr>
               <?php $no++; }?>
          </tbody>

          <tfoot>
               <?php
               foreach($keterangan as $ket =>$hasil){
               ?>
               <tr bgcolor="silver">
                    <th colspan="5"><?= $ket ?></th>
                    <th colspan="2"><?= $hasil ?></th>
               </tr>
               <?php }?>
          </tfoot>
     </table>

</fieldset>