<?php

namespace models\vehicule;

class Carburant {
    // Type de carburant Diesel
    public const DIESEL = 'Diesel';
    // Type de carburant Essence
    public const ESSENCE = 'Essence';

    // Retourne le nom du carburant passé en paramètre
    public static function getName(string $carburant): string {
        if ($carburant === self::DIESEL) {
            return 'Diesel';
        }
        if ($carburant === self::ESSENCE) {
            return 'Essence';
        }
        return '';
    }
}
