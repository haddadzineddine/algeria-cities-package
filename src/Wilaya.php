<?php

namespace AlgeriaCities;


class Wilaya
{
    protected array $communes = [];

    public function __construct(
        protected int $code,
        protected string $name,
        protected string $arabic_name
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
    public function getArabicName()
    {
        return $this->arabic_name;
    }

    /**
     * @return void
     */
    public function loadCommunes(...$communes): void
    {
        array_map(
            fn ($commune) => $this->isValid($commune) && $this->communes[] = $commune,
            $communes
        );
    }

    /**
     * Check if the param is type of Commune
     * @param mixed $wilaya
     * @return bool
     * @throws \Exception
     */
    protected function isValid($wilaya)
    {
        if (!$wilaya instanceof Commune) {
            throw new \Exception('The argument must be an instance of Commune');
        }

        return true;
    }

    /**
     * Get all communes
     * @return array
     */

    public function getCommunes()
    {
        return $this->communes;
    }
}
