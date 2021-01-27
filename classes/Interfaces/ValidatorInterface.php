<?php

namespace Interfaces;

use Computer;

interface ValidatorInterface
{
    /**
     * Cette fonction va renvoyer :
     * - true si l'objet Computer passé en paramètre est valide (qu'il a les bons composants et les bons devices)
     * - false sinon
     *
     * @param Computer $computer
     *
     * @return bool
     */
    public function validate(Computer $computer): bool;
}