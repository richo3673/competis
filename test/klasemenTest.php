<?php

namespace pemweb\test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

require_once "./test/source/m_klasemen.php";

class klasemenTest extends TestCase
{
    public function testKlasemen()
    {
        $klasemen = new m_klasemen();
        $array = $klasemen->cetakKlasemen();
        //Tes apakah  hasil return method memiliki tipe data array
        Assert::assertIsArray($klasemen->cetakKlasemen(), 'Assert is array');
        //Tes apakah Arsenal berada di urutan pertama
        Assert::assertContains('Barcelona', reset($array));
        //Tes apakah MU ada di urutan terakhir
        Assert::assertContains('Manchester United', end($array));

        //Tes apakah Barcelona di urutan ketiga -> tidak valid
        Assert::assertContains('Arsenal', $array[2], 'Urutan tidak sesuai !!');
    }
}