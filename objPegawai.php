<?php

     require 'Pegawai.php';
     // membuat object pegawai
     $pegawai1 = new Pegawai('101', 'Anggie', 'Manager', 'islam', 'menikah');
     $pegawai2 = new Pegawai('102', 'Raka', 'Asisten Manager', 'Buddha', 'menikah');
     $pegawai3 = new Pegawai('103', 'Nurul', 'Asisten Manager', 'islam', 'belum menikah');
     $pegawai4 = new Pegawai('104', 'Ray', 'Kepala Bagian', 'Kristen', 'belum menikah');
     $pegawai5 = new Pegawai('105', 'Erpa', 'Kepala Bagian', 'islam', 'menikah');
     $pegawai6 = new Pegawai('106', 'Lia', 'Staff', 'islam', 'menikah');
     $pegawai7 = new Pegawai('107', 'Delisa', 'Staff', 'islam', 'belum menikah');


     $ar_pegawai = [$pegawai1, $pegawai2, $pegawai3, $pegawai4, $pegawai5, $pegawai6, $pegawai7];

     foreach($ar_pegawai as $pegawai){
          $pegawai->cetakGaji();
     }

     echo '<br>Jumlah Pegawai '.Pegawai::$jml.' Orang';


?>