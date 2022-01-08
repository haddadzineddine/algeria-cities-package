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

        $this->assertEquals($city->getWilaya('wilaya that does not exist'), null);
    }

    /** @test */
    public function can_get_all_wilayas()
    {
        $wilaya_1 = new Wilaya(1, 'Adrar', 'أدرار');
        $wilaya_2 = new Wilaya(2, 'Chlef', 'شلف');
        $wilaya_3 = new Wilaya(3, 'Laghouat', 'لغوات');
        $city = City::load($wilaya_1, $wilaya_2, $wilaya_3);

        $this->assertEquals($city->getWilayas(), [$wilaya_1, $wilaya_2, $wilaya_3]);
    }

    /** @test */
    public function throw_exception_if_one_of_arg_is_not_a_type_of_wilaya_in_add_methode()
    {

        $this->expectErrorMessage('The argument must be an instance of Wilaya');

        $wilaya = 'not type of wilaya';
        City::load($wilaya);
    }
}
