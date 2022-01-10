<?php
namespace AlgeriaCities;


class Commune
{

    public function __construct(
        protected int $wilaya_code,
        protected string $name,
        protected string $arabic_name
    ) {
        //
    }


    public function getWilayaCode()
    {
        return $this->wilaya_code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getArabicName()
    {
        return $this->wilaya;
    }
}
