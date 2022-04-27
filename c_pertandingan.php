<?php
include_once("m_pertandingan.php");


if (isset($_POST['simpan'])) {
    if(isset($_POST['klub'])){
    $id = $_POST['klub'];
    $pertandingan = new c_pertandingan(null,null,null,null,null);
    $pertandingan->getbyID($id);}
    else{
        echo "Silahkan pilih pertandingan";
        $pertandingan = new c_pertandingan(null,null,null,null,null);
        $pertandingan->getRiwayat();
    }
}elseif (isset($_POST['update'])) {
    $id = $_POST['id'];
    $klub1 = $_POST['klub1'];
    $klub2 = $_POST['klub2'];
    $poin1 = $_POST['skor1'];
    $poin2 = $_POST['skor2'];
    $pertandingan = new c_pertandingan($id,$klub1, $klub2,  $poin1, $poin2);
    $pertandingan->addPoint();
    echo "<script>location.href = 'c_pertandingan.php'</script>";
}else{
    $pertandingan = new c_pertandingan(null,null,null,null,null);
    $pertandingan->getRiwayat();
}


class c_pertandingan{
    public $model;

    public function __construct($id_pertandingan,$klub1, $klub2, $poin1, $poin2){
        $this->model = new m_pertandingan($id_pertandingan,$klub1, $klub2,$poin1, $poin2);
    }
    public function getbyID($id){
        $pertandinganid = $this->model->getPertandinganbyID($id);
        $pertandingan = $this->model->getRiwayatPertandingan();
        include "v_pertandingan.php";
    }
    public function addPoint(){
        $pertandingan = $this->model->setPoint();
        $pertandingan = $this->model->getRiwayatPertandingan();
        include "v_pertandingan.php";
    }
    public function getRiwayat(){
        $pertandingan = $this->model->getRiwayatPertandingan();
        include "v_pertandingan.php";
    }

}