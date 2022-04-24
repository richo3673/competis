<?php
include_once("m_jadwal.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['input'])) {
        $klub1 = $_REQUEST['klub1'];
        $klub2 = $_REQUEST['klub2'];
        $tanggal = $_REQUEST['tanggal'];
        $jadwal = new c_jadwal($klub1, $klub2,$tanggal);
        $jadwal->addJadwal();
        //header('Location:c_jadwal.php');
    }else{
        header('Location:c_jadwal.php');
    }
}else{
    $jadwal  = new c_jadwal(null,null,null,null);
    $jadwal->getJadwal();
}



class c_jadwal{
    public $model;

    public function __construct($klub1, $klub2,$tanggal){
        $this->model = new m_jadwal($klub1, $klub2,$tanggal);
    }

    public function addJadwal(){
        $jadwal = $this->model->addJadwal();
        $jadwal = $this->model->getJadwal();
        //include "v_jadwal.php";
        header('Location:c_jadwal.php');
    }
    public function getJadwal(){
        $jadwal = $this->model->getJadwal();
        include "v_jadwal.php";
    }

}