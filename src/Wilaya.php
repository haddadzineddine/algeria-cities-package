<?php

namespace AlgeriaCities;


class Wilaya
{
    public function __construct(
        protected $code,
        protected $name,
        protected $name_ascii
    ) {
        //
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameAscii()
    {
        return $this->name_ascii;
    }
}
