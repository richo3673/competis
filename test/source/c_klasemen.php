<?php
require "koneksi.php";
include_once "m_klasemen.php";

$klasemen = new c_klasemen();
$klasemen->getKlasemen();

class c_klasemen
{
    public $model;

    public function __construct()
    {
        $this->model = new  m_klasemen();
    }

    public function getKlasemen()
    {
        $klasemen = $this->model->cetakKlasemen();
        include "v_klasemen.php";
    }
}