<?php
namespace pemweb\test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

require_once "./test/source/m_pertandingan.php";

class pertandinganTest extends TestCase{
    public function testPertandingan(){
        $pertandingan = new m_pertandingan(90,'Tottenham Hotspur', 'Barcelona', '5', '6');
        $pertandingan->setPoint();
        Assert::assertIsArray($pertandingan->getPoint(),'Assert bukan array');
        //Tes apakah jumlah pertandingan bertambah menjadi 8
        Assert::assertEquals(8, count($pertandingan->getRiwayatPertandingan()), "Uji coba gagal");
        //Tes apakah klub yang bertanding ke-8 Tottenham Hotspur
        Assert::assertContains('Tottenham Hotspur',($pertandingan->getRiwayatPertandingan())[7]);

        //Tes apakah klub yang bertanding ke-8 Real Madrid ->tidak valid
        Assert::assertContains('Real Madrid',($pertandingan->getPoint())[7], 'Pertandingan tidak sesuai !!');
    }
}