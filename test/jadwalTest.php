<?php
namespace pemweb\test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

require_once "./test/source/m_jadwal.php";

class jadwalTest extends TestCase{
    public function testJadwal(){
        $jadwal = new m_jadwal('Tottenham Hotspur', 'Barcelona', '2022-04-25');
        $jadwal->addJadwal();
        //Tes apakah return method tidak empty
        Assert::assertNotEmpty($jadwal->getJadwal());
        //Tes apakah  hasil return method memiliki tipe data array
        Assert::assertIsArray($jadwal->getJadwal(),'Assert is array');
        //Tes apakah jumlah jadwal dari return method getJadwal() adalah 7 -> valid
        Assert::assertEquals(8, count($jadwal->getJadwal()));
        //Tes apakah hasil return method memiliki key tanggal
        Assert::assertArrayHasKey('tanggal',($jadwal->getJadwal())[0]);
        //Tes apakah jadwal pertandingan di tanggal 25-04-2022 telah ditambahkan
        Assert::assertContains('2022-04-25',($jadwal->getJadwal())[7]);

        //Tes apakah terdapat pertandingan pada tanggal 26-04-2022 -> tidak valid
        Assert::assertContains('2022-04-26',($jadwal->getJadwal())[7], 'Jadwal pertandingan tidak sesuai !!');
    }
}