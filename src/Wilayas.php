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


    public function add(array $wilayas): void
    {
        array_map(
            fn ($wilaya) => $this->isValid($wilaya) && $this->wilayas[] = $wilaya,
            $wilayas
        );
    }

    public function all()
    {
        return $this->wilayas;
    }


    protected function isValid($wilaya)
    {
        if (!$wilaya instanceof Wilaya) {
            throw new \Exception('Wilaya must be an instance of Wilaya');
        }

        return true;
    }
}
