<?php

use AlgeriaCities\City;

use AlgeriaCities\Wilaya;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    /** @test */
    public function can_get_wilaya_by_its_code()
    {
        $wilaya = new Wilaya(1, 'Adrar', 'أدرار');
        $city = City::load($wilaya);

        $this->assertEquals($city->getWilaya(1), $wilaya);
        $this->assertEquals($city->getWilaya('Adrar'), $wilaya);
        $this->assertEquals($city->getWilaya('أدرار'), $wilaya);
    }

    /** @test */
    public function cannot_get_wilaya_that_does_not_exist()
    {
        $city = new City(); 

        $this->assertEquals($city->getWilaya(10), null);

    }
}
