<?php
     require_once 'lingkaran.php';
     require_once 'persegiPanjang.php';
     require_once 'segitiga.php';
     
    
     // lingkaran
     $lingkaran = new Lingkaran(14);
     // persegi panjang
     $persegi_panjang = new PersegiPanjang(11, 5);
     // segitiga
     $segitiga = new Segitiga(8, 7);


     // mencetak dalam bentuk tabel
     echo "<fieldset> 
          <legend>
               <font>
                    Cetak Sederhana Data 2 Dimensi
               </font>
          </legend>";
     echo "<table>";
     echo "<tr>
               <th>Bentuk</th>
               <th>Luas</th>
               <th>Keliling</th>
          </tr>";
     foreach ([$lingkaran, $persegi_panjang, $segitiga] as $objek) {
     echo "<tr>
          <td>{$objek->namaBidang()}</td>
          <td>{$objek->luasBidang()}</td>
          <td>{$objek->kelilingBidang()}</td>
          </tr>";
     }
     echo "</table>";
     echo "</fieldset>";



?>







<!--Dalam bentuk tabel yang Rapi-->


<fieldset> 
        <legend>
            <font color="blod" size="5" face="calibri">
                Bentuk 2 Dimensi
            </font>
        </legend>

     <table border="1" align="center" cellpadding="9" cellspacing="0" style="width: 50%;">
          <thead>
               <tr bgcolor="gray">
                    <th>No</th>
                    <th>Bentuk</th>
                    <th>Luas</th>
                    <th>Keliling</th>
               </tr>
          </thead>

          <tbody>
               <?php
               $no =1;
               foreach ([$lingkaran, $persegi_panjang, $segitiga] as $objek) {
                    $warna = $no % 2 == 1 ? 'greenblue' : 'greenyellow';
                    ?>
                    <tr bgcolor="<?= $warna; ?>">
                         <td><?= $no ?></td>
                         <td><?= $objek->namaBidang() ?></td>
                         <td><?= $objek->luasBidang() ?></td>
                         <td><?= $objek->kelilingBidang() ?></td>
               
                    </tr>
               <?php $no++; } ?>
          </tbody>

     </table>

</fieldset>