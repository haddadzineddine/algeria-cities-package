<?php

use AlgeriaCities\City;

use AlgeriaCities\Wilaya;
use AlgeriaCities\Commune;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{

    /** @test */
    public function can_get_wilaya_by_its_code_and_name()
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

    /** @test */
    public function can_get_all_communes_of_wilaya()
    {

        $wilaya = new Wilaya(1, 'Adrar', 'أدرار');
        $commune_1 = new Commune(1, 'Bouda', 'بودة');
        $commune_2 = new Commune(2, 'Ouled Ahmed Timmi', 'أولاد أحمد تيمي');
        $commune_3 = new Commune(3, 'Fenoughil', 'فنوغيل');

        $wilaya->loadCommunes($commune_1, $commune_2, $commune_3);

        $this->assertEquals($wilaya->getCommunes(), [$commune_1, $commune_2, $commune_3]);
    }

    /** @test */
    public function throw_exception_if_one_of_arg_is_not_a_type_of_commune_in_loadCommunes_methode()
    {

        $this->expectErrorMessage('The argument must be an instance of Commune');

        $commune = 'not type of commune';
        $wilaya = new Wilaya(1, 'Adrar', 'أدرار');
        $wilaya->loadCommunes($commune);
    }
}
