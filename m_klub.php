<?php
require "koneksi.php";
class m_klub {
    private $nama;
    private $stadion;
    private $manager;
    private $poin;
    private $jumlahmenang;
    private $jumlahkalah;
    private $jumlahseri;
    private $jumlahgol;
    private $jumlahkebobol;
    public $res = array();


    public function __construct($nama, $stadion, $manager,$poin)
    {
        $this->nama = $nama;
        $this->stadion = $stadion;
        $this->manager = $manager;
        $this->poin = $poin;

    }

    public function setKlub(){
        global $mysqli;
        if (isset($this->nama)){
            $mysqli->query("INSERT INTO klub (nama, stadion,manager,poin) VALUES ('$this->nama','$this->stadion','$this->manager','$this->poin')");
        }
        }

    public function getKlub(){
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM klub");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->res = $rows;
        return $this->res;
    }

}