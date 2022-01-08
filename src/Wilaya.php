<?php

namespace AlgeriaCities;


class Wilaya
{
    public function __construct(
        protected int $code,
        protected string $name,
        protected string $name_ascii
    ) {
        //
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
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
    public function getNameAscii()
    {
        return $this->name_ascii;
    }
}
