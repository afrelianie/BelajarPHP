<?php

     require_once 'abstract1.php';
     class Segitiga extends Bentuk2D {
     public $alas;
     public $tinggi;
     
     public function __construct($alas, $tinggi) {
         $this->alas = $alas;
         $this->tinggi = $tinggi;
     }
     
     public function namaBidang() {
         return "Segitiga";
     }
     
     public function luasBidang() {
         return 0.5 * $this->alas * $this->tinggi;
     }
     
     public function kelilingBidang() {
         return $this->alas + 2 * ((pow($this->tinggi, 2) + pow(0.5 * $this->alas, 2)) ** 0.5);
     }
     }

?>