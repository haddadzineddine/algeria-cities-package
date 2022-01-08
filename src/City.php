<?php

namespace AlgeriaCities;




class City
{
    protected  Wilayas $wilayas;

    public function __construct()
    {
        $this->wilayas = Wilayas::load();
    }
    

    /**
     * @param Wilaya $wilaya
     * @return City
     */
    public static function load(...$wilayas): self
    {
        $instance = new static();

        $instance->wilayas->add($wilayas);

        return $instance;
    }

    /**
     * Get the wilaya by its code or name 
     * @param string|int $id
     * @return Wilaya|null
     */
    public function getWilaya(string | int $wilaya): Wilaya | null
    {
        return $this->wilayas->filter($wilaya);
    }

    /**
     * Get all wilayas
     * @return array
     */
    public function getWilayas(): array
    {
        return $this->wilayas->all();
    }
}
