<?php

     class Pegawai{
          protected $nip;
          public $nama;
          static $jml = 0;

          private $jabatan;
          private $agama;
          private $status;
          private $gapok;
          private $tunjJab;
          private $tunjKel;
          private $zakat;
          private $gajiBersih;
          const PT = 'PT. HTP Indonesia';

          public function __construct($nip, $nama, $jabatan, $agama, $status) {
               $this->nip = $nip;
               $this->nama = $nama;
               $this->jabatan = $jabatan;
               $this->agama = $agama;
               $this->status = $status;
               $this->gajiPokok = $this->setGajiPokok($jabatan);
               $this->tunjJab = $this->gajiPokok * 0.2;
               $this->tunjKel = ($status == 'menikah') ? ($this->gajiPokok * 0.1) : 0;
               $this->zakat = ($this->agama == 'islam' && $this->gajiKotor() >= 6000000) ? ($this->gajiKotor() * 0.025) : 0;
               $this->gajiBersih = $this->gajiKotor() - $this->zakat;
               self::$jml++;
           }
       
           public function setGajiPokok($jabatan){
               switch($jabatan){
                 case 'Manager' : $gapok = 20000000; break;
                 case 'Asisten Manager' : $gapok = 15000000; break;
                 case 'Kepala Bagian' : $gapok = 10000000; break;
                 case 'Staff' : $gapok = 4000000; break;
       
                 default: $gapok = 0;
               }
               return $gapok;
           }
       
           public function gajiKotor() {
               return $this->gajiPokok + $this->tunjJab + $this->tunjKel;
           }


          public function cetakGaji() {
               echo '<br><u>'.self::PT.'</u></br>';
               echo "NIP: ".$this->nip."<br>";
               echo "Nama: ".$this->nama."<br>";
               echo "Jabatan: ".$this->jabatan."<br>";
               echo "Agama: ".$this->agama."<br>";
               echo "Status: ".$this->status."<br>";
               echo "Gaji Pokok: Rp. ".number_format($this->gajiPokok, 0, ',', '.')."<br>";
               echo "Tunjangan Jabatan: Rp. ".number_format($this->tunjJab, 0, ',', '.')."<br>";
               echo "Tunjangan Keluarga: Rp. ".number_format($this->tunjKel, 0, ',', '.')."<br>";
               echo "Zakat Profesi: Rp. ".number_format($this->zakat, 0, ',', '.')."<br>";
               echo "Gaji Bersih: Rp. ".number_format($this->gajiBersih, 0, ',', '.')."<br><br>";
          }
     }

?>