<?php

use Interfaces\HasNameInterface;
use Traits\HasNameTrait;

abstract class Computer implements HasNameInterface, JsonSerializable
{
    use HasNameTrait;

    /** @var array */
    protected $components = [];

    /** @var array */
    protected $devices = [];

    /**
     * @return array
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    /**
     * @param array $components
     *
     * @return self
     *
     * @throws Exception
     */
    public function setComponents(array $components): self
    {
        foreach ($components as $component) {
            if (!$component->isCompatibleWith(get_class($this))) {
                throw new Exception("Le composant ".$component->getName()." n'est pas compatible avec un ordinateur de type ".get_class($this));
            }
            $this->components[] = $component;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getDevices(): array
    {
        return $this->devices;
    }

    /**
     * @param array $devices
     *
     * @return self
     *
     * @throws Exception
     */
    public function setDevices(array $devices): self
    {
        foreach ($devices as $device) {
            if (!$device->isCompatibleWith(get_class($this))) {
                throw new Exception("Le périphérique ".$device->getName()." n'est pas compatible avec un ordinateur de type ".get_class($this));
            }
            $this->devices[] = $device;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'name'       => $this->getName(),
            'components' => $this->getComponents(),
            'devices'    => $this->getDevices(),
        ];
    }
}