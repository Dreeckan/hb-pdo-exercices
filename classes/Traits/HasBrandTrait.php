<?php

namespace Traits;

use Interfaces\HasBrandInterface;

/**
 * Pour utiliser ce trait dans une classe, il FAUT que cette classe implémente HasBrandInterface
 */
trait HasBrandTrait
{
    /** @var string */
    protected $brand = '';

    /**
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param string|null $brand
     *
     * @return HasBrandInterface
     */
    public function setBrand(?string $brand): HasBrandInterface
    {
        $this->brand = $brand;

        return $this;
    }
}