<?php

namespace AlgeriaCities;



class Wilayas
{
    protected array $wilayas = [];


    public static function load(): self
    {
        $instance = new static();

        // 

        return $instance;
    }


    public function filter(string | int $id): Wilaya | null
    {
        if (is_numeric($id)) {
            return array_filter(
                $this->wilayas,
                fn ($wilaya) => $wilaya->getCode() == $id
            )[0] ?? null;
        }


        return array_filter(
            $this->wilayas,
            fn ($wilaya) => $wilaya->getName() == $id || $wilaya->getNameAscii() == $id
        )[0] ?? null;
    }


    public function add(Wilaya $wilaya): void
    {
        $this->wilayas[] = $wilaya;
    }
}
