<?php

use AlgeriaCities\Wilaya;
use AlgeriaCities\Commune;
use PHPUnit\Framework\TestCase;




class WilayaTest extends TestCase
{
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
