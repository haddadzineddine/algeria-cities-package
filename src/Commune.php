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

    /**
     * @return int
     */
    public function getWilayaCode(): int
    {
        return $this->wilaya_code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getArabicName(): string
    {
        return $this->wilaya;
    }
}
