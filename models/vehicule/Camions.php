<?php
namespace models\vehicule;

use models\vehicule\ImatriculationRepete;

class Camions extends Vehicule {
    public const PERMIS_INCLUE = 'C'; 
    public const AGE_MINIMAL = 21; 

    // Constructeur avec génération du matricule à partir des éléments (numéro, série, province)
    public static function createWithElements(string $nomModele, int $numeroOrdre, string $lettreSeries, int $codeProvince, string $dateFabrication, int $kilometrageParcouru, string $typeCarburant): self {
        // Génération du matricule sous forme de chaîne (ex: 123-AB-45)
        $matricule = sprintf('%d-%s-%02d', $numeroOrdre, strtoupper($lettreSeries), $codeProvince);
        return new self($nomModele, $matricule, $dateFabrication, $kilometrageParcouru, $typeCarburant);
    }

    // Constructeur principal avec matricule déjà formé
    public function __construct(string $nomModele, string $matricule, string $dateFabrication, int $kilometrageParcouru, string $typeCarburant) {
        parent::__construct($nomModele, $matricule, $dateFabrication, $kilometrageParcouru, $typeCarburant);
    }
}