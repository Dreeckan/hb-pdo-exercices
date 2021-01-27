<?php

namespace Validator;

use Component\AbstractComponent;
use Component\Cpu;
use Component\GraphicCard;
use Component\MotherBoard;
use Component\Ram;
use Computer;
use Device\AbstractDevice;
use Device\Keyboard;
use Device\Mouse;
use Device\Speaker;
use Interfaces\ValidatorInterface;

class ComputerValidator implements ValidatorInterface
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
    public function validate(Computer $computer): bool
    {
        // On va vérifier que les composants et périphériques sont bien compatible avec l'ordinateur en cours, on en récupère donc le nom de classe complet
        $className = get_class($computer);
        // On récupère la liste des composants de notre objet computer
        $components = $computer->getComponents();
        // On récupère la liste des périphériques de notre objet computer
        $devices = $computer->getDevices();

        // On va compter le nombre de nos différents composants et périphériques possibles
        $countCpu = 0;
        $countGraphicCard = 0;
        $countMotherBoard = 0;
        $countRam = 0;
        $countKeyboard = 0;
        $countMouse = 0;
        $countSpeaker = 0;
        $countErrors = 0; // On va aussi compter ceux qui sont carrément invalide (ni un composant, ni un périphérique)

        // On parcourt les composants et selon le type, on incrémente une variable différente
        /** @var AbstractComponent $component */
        foreach ($components as $component) {
            // Ici, on se sert de instanceof pour vérifier si l'objet $component est une instance de l'un de nos types
            if (!$component->isCompatibleWith($className)) {
                $countErrors++;
            } elseif ($component instanceof Cpu) {
                $countCpu++;// équivalent à $countCpu = $countCpu + 1;
            } elseif ($component instanceof GraphicCard) {
                $countGraphicCard++;
            } elseif ($component instanceof MotherBoard) {
                $countMotherBoard++;
            } elseif ($component instanceof Ram) {
                $countRam++;
            } else {
                $countErrors++;
            }
        }

        // On répète l'opération pour les périphériques
        foreach ($devices as $device) {
            if (!$device->isCompatibleWith($className)) {
                $countErrors++;
            } elseif ($device instanceof Keyboard)  {
                $countKeyboard++;
            } elseif ($device instanceof Mouse)  {
                $countMouse++;
            } elseif ($device instanceof Speaker)  {
                $countSpeaker++;
            } else {
                $countErrors++;
            }
        }

        // Ensuite, on va comparé les nombres obtenus avec nos contraintes :
        // - un objet MotherBoard,
        // - un objet Ram,
        // - un objet Cpu,
        // - 0 ou un objet GraphicCard
        // - un objet Keyboard,
        // - un objet Mouse,
        // - 0 ou un objet Speaker



        // Si on lit directement l'énoncé, on peut construire cette condition. Ici, on va dire directement que l'on veut que toutes les conditions énoncés sont respectées à la fois :
        //
        // if ($countErrors == 0 && $countCpu == 1 && $countMotherBoard == 1 && $countRam == 1 && $countGraphicCard <= 1 && $countKeyboard == 1 && countMouse == 1 && $countSpeaker <= 1) {
        //     return true;
        // }
        // return false;

        // Si on fait la contraposé de la version précédente (on va regarder les conditions qui rendent l'objet invalide, plutôt que de regarder ce qui rend l'objet valide)
        //
        // if ($countErrors > 0 || $countCpu != 1 || $countMotherBoard != 1 || $countRam != 1 || $countGraphicCard > 1 || $countKeyboard != 1 || countMouse != 1 || $countSpeaker > 1) {
        //     return false;
        // }
        // return true;

        // Troisième méthode, venue de la contraposée, avec plusieurs if les uns à la suite des autres. Ici, on utilise le fait que l'une de ces conditions est suffisante pour dire que l'objet n'est PAS valide. On aurait aussi pu écrire la même chose avec des elseif ou un switch

        if ($countErrors > 0) {
            return false;
        }
        if ($countRam != 1) {
            return false;
        }
        if ($countCpu != 1) {
            return false;
        }
        if ($countMotherBoard != 1) {
            return false;
        }
        if ($countGraphicCard > 1) {
            return false;
        }
        if ($countKeyboard != 1) {
            return false;
        }
        if ($countMouse != 1) {
            return false;
        }
        if ($countSpeaker > 1) {
            return false;
        }

        return true;
    }

    /**
     * Cette méthode est une alternative à la fonction validate et utilise la fonction array_filter plutôt qu'une boucle. Elle n'est pas plus optimisée ou plus courte, juste différente ;)
     *
     * @param Computer $computer
     *
     * @return bool
     */
    public function validateArrayFilter(Computer $computer): bool
    {
        // On va vérifier que les composants et périphériques sont bien compatible avec l'ordinateur en cours, on en récupère donc le nom de classe complet
        $className = get_class($computer);
        $components = $computer->getComponents();

        $errors = array_filter($components, function($component) use ($className) {
            return !$component instanceof AbstractComponent
                || !$component->isCompatibleWith($className);
        });

        if (count($errors) > 0) {
            return false;
        }

        $cpus = array_filter($components, function($component) {
            return $component instanceof Cpu;
        });

        if (count($cpus) != 1) {
            return false;
        }

        $motherBoard = array_filter($components, function($component) {
            return $component instanceof MotherBoard;
        });

        if (count($motherBoard) != 1) {
            return false;
        }

        $ram = array_filter($components, function($component) {
            return $component instanceof Ram;
        });

        if (count($ram) != 1) {
            return false;
        }

        $graphicCard = array_filter($components, function($component) {
            return $component instanceof GraphicCard;
        });

        if (count($graphicCard) > 1) {
            return false;
        }

        //
        // Vérification des périphériques
        //

        $devices = $computer->getDevices();

        $errors = array_filter($devices, function($device) use ($className) {
            return !$device instanceof AbstractDevice
                || !$device->isCompatibleWith($className);
        });

        if (count($errors) > 0) {
            return false;
        }

        $keyboard = array_filter($devices, function($device) {
            return $device instanceof Keyboard;
        });

        if (count($keyboard) != 1) {
            return false;
        }

        $mouse = array_filter($devices, function($device) {
            return $device instanceof Mouse;
        });

        if (count($mouse) != 1) {
            return false;
        }

        $speaker = array_filter($devices, function($device) {
            return $device instanceof Speaker;
        });

        if (count($speaker) > 1) {
            return false;
        }

        return true;
    }
}