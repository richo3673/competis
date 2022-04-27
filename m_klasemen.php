<?php
require "koneksi.php";

class m_klasemen
{
    public $res = array();
    private $nama;
    private $poin;
    private $jumlahmenang;
    private $jumlahkalah;
    private $jumlahseri;
    private $jumlahgol;
    private $jumlahkebobol;

    //public function __construct($nama, $poin, $jumlahmenang, $jumlahkalah, $jumlahseri, $jumlahgol, $jumlahkebobol)
    //{
    //    $this->nama = $nama;
    //    $this->poin = $poin;
    //    $this->jumlahmenang = $jumlahmenang;
    //    $this->jumlahkalah = $jumlahkalah;
    //    $this->jumlahseri = $jumlahseri;
    //    $this->jumlahgol = $jumlahgol;
    //    $this->jumlahkebobol = $jumlahkebobol;
    //}

    public function cetakKlasemen()
    {
        global $mysqli;
        $rs = $mysqli->query("SELECT nama,poin,jumlahmenang,jumlahkalah,jumlahseri,jumlahgol,jumlahkebobol,selisihgol FROM klub");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->res = array_filter($rows, fn($nama) => !is_null($nama) && $nama !== '');
        //SORTIR KLASEMEN $this->res
        usort($this->res, function ($a, $b) {
            if ($a['poin'] == $b['poin'] and ($a['poin']!=0)) { //JIKA POIN A DAN B SAMA DAN TIDAK 0 (RETURN 'ELSE' DI LINE 60)
                global $mysqli;
                $aa = $a['nama'];
                $bb = $b['nama'];
                //AMBIL RIWAYAT PERTANDINGAN BERDASARKAN KEY NAMA
                $rs = $mysqli->query("SELECT klub1,klub2,skor1,skor2 from JADWAL WHERE klub1='$aa' and klub2='$bb'");
                $row = $rs->fetch_assoc();
                if (is_null($row) OR $row['skor1'] == $row['skor2']) { //JIKA  A DAN B TIDAK PERNAH BERTEMU ATAU SKOR RIWAYAT PERANDINGAN ANTARA A DAN B SAMA
                    //MAKA CEK SEILIH GOL
                    if ($a['selisihgol'] == $b['selisihgol']) { //JIKA SELISIH GOL SAMA
                        //MAKA CEK JUMLAH GOL
                        if ($a['jumlahgol'] == $b['jumlahgol']) { //JIKA JUMLAH GOL SAMA
                            return 0 ;   //RETURN 0 (DEFAULT)
                        }
                        return $a['jumlahgol'] > $b['jumlahgol'] ? -1 : 1; //JIKA JUMLAH GOL TIDAK SAMA, DIURUTKAN GOL YANG LEBIH BESAR
                    }
                    return $a['selisihgol'] > $b['selisihgol'] ? -1 : 1; //JIKA SELISIH GOL TIDAK SAMA, DIURUTKAN SELISIH GOL YANG LEBIH BESAR
                } elseif (($row['skor1'] > $row['skor2'])) {
                    return $a < $b ? -1 : 1;//JIKA SKOR RIWAYAT PERANDINGAN ANTARA A DAN B LEBIH UNGGUL A, MAKA A DIURUTKAM DAHULU
                }else{
                    return $a > $b ? -1 : 1; //JIKA SKOR RIWAYAT PERANDINGAN ANTARA A DAN B LEBIH UNGGUL B, MAKA B DIURUTKAM DAHULU
                }
            }
            return $a['poin'] > $b['poin'] ? -1 : 1; //JIKA POIN A DAN B TIDAK SAMA, DIURUTKAN POIN YANG LEBIH BESAR
        });
        return $this->res;
    }

}