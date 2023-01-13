<?php
namespace pemweb\test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

require_once "./test/source/m_klub.php";

class klubTest extends TestCase{
    public function testKlub(){
        $klub = new m_klub('Tottenham Hotspur', 'Tottenham Stadium', 'Antonio Conte', 'null');
        $klub->setKlub(); //menambahkan klub baru
        //Tes apakah return method klub tidak kosong
        Assert::assertNotEmpty($klub->getKlub());
        //Tes apakah tipe data hasil return method adalah array
        Assert::assertIsArray($klub->getKlub(),'Assert is array');
        //Tes apakah jumlah klub berhasil bertambah menjadi 8
        Assert::assertEquals(8, count($klub->getKlub()), "Uji coba gagal");
        //Tes apakah terdapat klub Tottenham Hotspur pada klub baris ke-8
        Assert::assertContains('Tottenham Hotspur',($klub->getKlub())[7]);

        //Tes apakah jumlah klub 10 -> tidak valid
        Assert::assertEquals(10, count($klub->getKlub()), "Tes jumlah klub tidak sesuai !!");
    }

    public function testKlubExist(){
        $klub = new m_klub('null', 'null', 'null', 'null');
        //Tes apakah tipe data hasil return method adalah boolean
        Assert::assertIsBool($klub->KlubExist('Arsenal'));
        //Tes apakah klub return method true untuk klub Chelsea -->( tidak valid )
        Assert::assertEquals(True,$klub->klubExist('Chelsea'), 'Klub tidakk sesuai !!');

    }
}