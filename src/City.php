<?php

namespace AlgeriaCities;




class City
{
    protected  Wilayas $wilayas;

    public function __construct()
    {
        $this->wilayas = Wilayas::load();
    }

    public static function load(...$wilayas): self
    {
        $instance = new static();

        $instance->wilayas->add($wilayas);

        return $instance;
    }

    public function getWilaya(string | int $wilaya): Wilaya | null
    {
        return $this->wilayas->filter($wilaya);
    }

    public function getWilayas(): array
    {
        return $this->wilayas->all();
    }


}
