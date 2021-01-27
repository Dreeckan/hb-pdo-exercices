<?php

namespace Interfaces;

interface HasBrandInterface
{
    /**
     * @return string|null
     */
    public function getBrand(): ?string;

    /**
     * @param string|null $brand
     *
     * @return HasBrandInterface
     */
    public function setBrand(?string $brand): HasBrandInterface;
}