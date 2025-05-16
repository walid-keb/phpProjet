<?php

namespace models\vehicule;

use models\vehicule\ImatriculationRepete;

class Moto extends Vehicule {
    public const PERMIS_INCLUE = 'A'; // Les motos nécessitent un permis de type A
    public const AGE_MINIMAL = 18; // Âge minimal pour conduire une moto

    // Constructeur avec génération du matricule à partir des éléments (numéro, série, province)
    public static function createWithElements(string $nomModele, int $numeroOrdre, string $lettreSeries, int $codeProvince, string $dateFabrication, int $kilometrageParcouru, string $typeCarburant): self {
        $matricule = sprintf('%d-%s-%02d', $numeroOrdre, strtoupper($lettreSeries), $codeProvince);
        return new self($nomModele, $matricule, $dateFabrication, $kilometrageParcouru, $typeCarburant);
    }

    // Constructeur principal avec matricule déjà formé
    public function __construct(string $nomModele, string $matricule, string $dateFabrication, int $kilometrageParcouru, string $typeCarburant) {
        parent::__construct($nomModele, $matricule, $dateFabrication, $kilometrageParcouru, $typeCarburant);
    }
}
