<?php

namespace Traits;

use Computer\Desktop;
use Computer\Laptop;

trait HasCompatibilitiesTrait
{
    /** @var array */
    protected $compatibilities = [
        Desktop::class,
        Laptop::class,
    ];

    /**
     * @return array
     */
    public function getCompatibilities(): array
    {
        return $this->compatibilities;
    }

    /**
     * @param array $compatibilities
     *
     * @return self
     */
    public function setCompatibilities(array $compatibilities): self
    {
        $this->compatibilities = $compatibilities;

        return $this;
    }

    /**
     * @param string $className
     *
     * @return bool
     */
    public function isCompatibleWith(string $className): bool
    {
        return in_array($className, $this->getCompatibilities());
    }
}