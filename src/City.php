<?php

namespace AlgeriaCities;




class City
{
    protected  Wilayas $wilayas;

    public function __construct()
    {
        $this->wilayas = Wilayas::load();
    }


    public function getWilaya(string | int $wilaya): Wilaya | null
    {
        return $this->wilayas->filter($wilaya);
    }


    public static function load($wilaya): self
    {
        $instance = new static();

        $instance->wilayas->add($wilaya);

        return $instance;
    }
}
