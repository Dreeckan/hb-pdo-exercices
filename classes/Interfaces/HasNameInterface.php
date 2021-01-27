<?php

namespace Interfaces;

interface HasNameInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     *
     * @return HasNameInterface
     */
    public function setName(?string $name): HasNameInterface;
}