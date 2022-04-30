<?php

require "koneksi.php";

class m_pertandingan
{
    private $id_pertandingan;
    private $klub1;
    private $klub2;
    private $poin1;
    private $poin2;
    public $res = array();


    public function __construct($id_pertandingan, $klub1, $klub2, $poin1, $poin2)
    {
        $this->$id_pertandingan = $id_pertandingan;

        $this->klub1 = $klub1;
        $this->klub2 = $klub2;
        $this->poin1 = $poin1;
        $this->poin2 = $poin2;
    }

    public function getPertandinganbyID($id)
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT klub1, klub2, tanggal,id_pertandingan FROM jadwal WHERE id_pertandingan = '$id'");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->res = $rows;
        return $this->res;
    }

    public function setPoint()
    {
        global $mysqli;
        $mysqli->query("UPDATE jadwal set skor1='$this->poin1',skor2='$this->poin2' WHERE klub1 = '$this->klub1' and klub2 = '$this->klub2'");
        if ($this->poin1 > $this->poin2) { //JIKA POIN>POIN2, MAKA KLUB 1 MENANG
            $mysqli->query("UPDATE klub set poin = poin+3, jumlahmenang = jumlahmenang+1,jumlahgol=jumlahgol+'$this->poin1', jumlahkebobol=jumlahkebobol+'$this->poin2' where nama = '$this->klub1'");
            $mysqli->query("UPDATE klub set jumlahkalah = jumlahkalah+1, jumlahgol=jumlahgol+'$this->poin2',jumlahkebobol = jumlahkebobol + '$this->poin1',selisihgol = selisihgol + ('$this->poin2'-'$this->poin1') where nama = '$this->klub2'");
        } elseif ($this->poin2 > $this->poin1) { //SEBALIKNYA
            $mysqli->query("UPDATE klub set poin = poin+3, jumlahmenang = jumlahmenang+1,jumlahgol=jumlahgol+'$this->poin2', jumlahkebobol=jumlahkebobol+'$this->poin1' where nama = '$this->klub2'");
            $mysqli->query("UPDATE klub set jumlahkalah = jumlahkalah+1, jumlahgol=jumlahgol+'$this->poin1',jumlahkebobol = jumlahkebobol + '$this->poin2',selisihgol = selisihgol + ('$this->poin1'-'$this->poin2') where nama = '$this->klub1'");
        } else { //JIKA SERI
            $mysqli->query("UPDATE klub set poin = poin+1,jumlahseri = jumlahseri+1,jumlahgol=jumlahgol+'$this->poin1', jumlahkebobol=jumlahkebobol+'$this->poin2',selisihgol = selisihgol + ('$this->poin1'-'$this->poin2') where nama = '$this->klub1'");
            $mysqli->query("UPDATE klub set poin = poin+1, jumlahseri = jumlahseri+1, jumlahgol=jumlahgol+'$this->poin2',jumlahkebobol = jumlahkebobol + '$this->poin1',selisihgol = selisihgol + ('$this->poin2'-'$this->poin1') where nama = '$this->klub2'");
        }
    }

    public function getPoint()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT nama,poin FROM klub WHERE nama = '$this->klub1'  or nama = '$this->klub2' ");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->res[] = $rows;
        return $this->res;
    }

    public function getRiwayatPertandingan()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM jadwal");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->res = $rows;
        return $this->res;
    }
}

