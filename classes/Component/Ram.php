<?php

namespace Component;

class Ram extends AbstractComponent
{
    /** @var int */
    protected $size = 16;

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     *
     * @return Ram
     */
    public function setSize(int $size): Ram
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $ret = parent::jsonSerialize();
        $ret['size'] = $this->getSize();

        return $ret;
    }
}