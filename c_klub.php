<?php
include_once("m_klub.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['input'])) {
        $nama = $_REQUEST['nama'];
        $stadion = $_REQUEST['stadion'];
        $manager = $_REQUEST['manager'];
        $klub = new c_klub($nama, $stadion, $manager,0);
        $klub->addKlub();
        header('Location:main.php');
    }
}

class c_klub{
    public $model;

    /**
     * @param $model
     */
    public function __construct($nama, $stadion, $manager,$poin)
    {
        $this->model = new  m_klub($nama, $stadion, $manager,$poin);
    }

    public function addKlub(){
        $klub = $this->model->setKlub();
        $klub = $this->model->getKlub();
        include "v_klub.php";
    }
    public function getKlub(){
        $klub = $this->model->getKlub();
        include "v_klub.php";
    }


}