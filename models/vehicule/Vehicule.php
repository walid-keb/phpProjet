<?php
// Cette classe modélise un véhicule avec les informations nécessaires lors de la location
abstract class Vehicule {
    protected string $nomModele;
    protected string $matricule; // Chaîne unique (ex: "123-AB-45")
    protected string $dateFabrication; // Format YYYY-MM-DD
    protected int $kilometrageParcouru;
    protected string $typeCarburant;

    public function __construct(string $nomModele, string $matricule, string $dateFabrication, int $kilometrageParcouru, string $typeCarburant) {
        // Vérifier unicité du matricule (à faire dans la couche dépôt ou BDD)
        if (!preg_match('/^[a-zA-Z0-9 ]+$/', $nomModele)) {
            throw new \Exception('seul les caractères alphanumérique sont autorisés');
        }
        $this->nomModele = $nomModele;
        $this->matricule = $matricule;
        $this->dateFabrication = $dateFabrication;
        $this->kilometrageParcouru = $kilometrageParcouru;
        $this->typeCarburant = $typeCarburant;
        // L'ajout dans le dépôt ou la BDD doit vérifier l'unicité du matricule et lever ImatriculationRepete
    }

    // Retourne le nom et modèle du véhicule
    public function getNomModele(): string {
        return $this->nomModele;
    }
    // Retourne le matricule du véhicule
    public function getMatricule(): string {
        return $this->matricule;
    }
    // Retourne la date de fabrication
    public function getDateFabrication(): string {
        return $this->dateFabrication;
    }
    // Retourne le kilométrage parcouru
    public function getKilometrageParcouru(): int {
        return $this->kilometrageParcouru;
    }
    // Retourne le type de carburant
    public function getTypeCarburant(): string {
        return $this->typeCarburant;
    }
    // Ajoute du kilométrage
    public function ajouterKilometrage(int $distanceParcouru) {
        if ($distanceParcouru <= 0) {
            throw new \Exception('la valeur de la distance doit être strictement positif');
        }
        $this->kilometrageParcouru += $distanceParcouru;
    }
    // Affichage formaté du véhicule
    public function __toString(): string {
        return "Nom et modèle: {$this->nomModele}\nImmatricule: {$this->matricule}\nDate de fabrication: {$this->dateFabrication}\nKilométrage: {$this->kilometrageParcouru}\nType carburant: {$this->typeCarburant}";
    }
    // Comparaison d'égalité sur le matricule
    public function equals($obj): bool {
        if (!($obj instanceof Vehicule)) return false;
        return $obj->getMatricule() === $this->matricule;
    }
    // HashCode basé sur le matricule
    public function hashCode(): int {
        return crc32($this->matricule);
    }
}
