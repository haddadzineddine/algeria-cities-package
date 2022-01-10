<?php

namespace AlgeriaCities;



class Wilayas
{
    protected array $wilayas = [];

    /**
     * @param Wilaya $wilaya
     * @return Wilayas
     */
    public static function load(): self
    {
        $instance = new static();

        // TODO: Load wilayas from a file

        return $instance;
    }

    /**
     * @param string|int
     * @return Wilaya | null
     */
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
            fn ($wilaya) => $wilaya->getName() == $id || $wilaya->getArabicName() == $id
        )[0] ?? null;
    }

    /**
     * Add wilayas to the collection
     * @return void
     */
    public function add(array $wilayas): void
    {
        array_map(
            fn ($wilaya) => $this->isValid($wilaya) && $this->wilayas[] = $wilaya,
            $wilayas
        );
    }

    /**
     * Get all wilayas
     * @return array
     */
    public function all(): array
    {
        return $this->wilayas;
    }

    /**
     * Check if the param is type of Wilaya
     * @param mixed $wilaya
     * @return bool
     * @throws \Exception
     */
    protected function isValid($wilaya)
    {
        if (!$wilaya instanceof Wilaya) {
            throw new \Exception('The argument must be an instance of Wilaya');
        }

        return true;
    }
}
