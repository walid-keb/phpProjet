<?php
// Classe de dépôt pour gérer le stock total des véhicules
namespace models\vehicule;

use models\vehicule\ImatriculationRepete;
use models\vehicule\MatriculeNonTrouve;
use models\vehicule\SuppressionVehiculeEnLocation;

class DepotVehicules {
    // Tableau associatif pour stocker les véhicules, clé = matricule (string), valeur = objet Vehicule
    private static array $vehicules = [];

    // Vérifie si un matricule existe déjà dans le dépôt
    public static function containsMatricule(string $matricule): bool {
        return isset(self::$vehicules[$matricule]);
    }

    // Retourne le véhicule associé au matricule donné
    public static function getVehiculeFromMatricule(string $matricule): Vehicule {
        if (isset(self::$vehicules[$matricule])) {
            return self::$vehicules[$matricule];
        }
        throw new MatriculeNonTrouve();
    }

    // Ajoute un véhicule au dépôt (lève une exception si le matricule existe déjà)
    public static function ajouterVehicule(Vehicule $vehicule) {
        $matricule = $vehicule->getMatricule();
        if (self::containsMatricule($matricule)) {
            throw new ImatriculationRepete();
        }
        self::$vehicules[$matricule] = $vehicule;
    }

    // Supprime un véhicule du dépôt (lève une exception si le véhicule est en location)
    public static function supprimerVehicule(string $matricule) {
        // À adapter si CarnetLocations existe :
        // if (CarnetLocations::vehiculeExiste(self::getVehiculeFromMatricule($matricule))) throw new SuppressionVehiculeEnLocation();
        if (!self::containsMatricule($matricule)) {
            throw new MatriculeNonTrouve();
        }
        unset(self::$vehicules[$matricule]);
    }

    // Sauvegarde tous les véhicules dans un fichier texte
    public static function sauvegarderVehicules(string $filePath) {
        $file = fopen($filePath, 'w');
        foreach (self::$vehicules as $vl) {
            $saveLine = get_class($vl) . ";;" . $vl->getNomModele() . ";;" . $vl->getMatricule() . ";;" . $vl->getKilometrageParcouru() . ";;" . $vl->getDateFabrication() . ";;" . $vl->getTypeCarburant();
            fwrite($file, $saveLine . "\n");
        }
        fclose($file);
    }

    // Restaure les véhicules depuis un fichier texte (à adapter selon le format et les classes)
    public static function restaurerVehicule(string $filePath) {
        if (!file_exists($filePath)) return;
        $lines = file($filePath, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            // À adapter : parser la ligne et créer l'objet véhicule correspondant
            // Exemple : list($type, $nom, $matricule, $km, $date, $carburant) = explode(';;', $line);
            // Puis instancier la bonne classe (Voiture, Camions, Moto, ...)
        }
    }
}
