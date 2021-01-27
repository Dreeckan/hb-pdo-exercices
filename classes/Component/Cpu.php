<?php

namespace Component;

class Cpu extends AbstractComponent
{
    /** @var float */
    protected $frequency = 0.0;

    /**
     * @return float
     */
    public function getFrequency(): float
    {
        return $this->frequency;
    }

    /**
     * @param float $frequency
     *
     * @return Cpu
     */
    public function setFrequency(float $frequency): Cpu
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $ret = parent::jsonSerialize();
        $ret['frequency'] = $this->getFrequency();

        return $ret;
    }
}