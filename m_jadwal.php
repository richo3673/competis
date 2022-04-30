<?php
require "koneksi.php";

class m_jadwal
{
    public $res = array();
    private $tanggal;
    private $klub1;
    private $klub2;

    public function __construct($klub1, $klub2, $tanggal)
    {
        $this->klub1 = $klub1;
        $this->klub2 = $klub2;
        $this->tanggal = $tanggal;
    }

    public function addJadwal()
    {
        global $mysqli;
        $mysqli->query("INSERT INTO jadwal(klub1, klub2, tanggal) VALUES ((SELECT nama FROM klub WHERE nama = '$this->klub1'),(SELECT nama FROM klub WHERE nama = '$this->klub2'),'$this->tanggal')");
    }

    public function getJadwal()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM jadwal ORDER BY tanggal");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->res = $rows;
        return $this->res;
    }

    public function getNamaKlub()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM klub");
        return $rs;
    }
}
