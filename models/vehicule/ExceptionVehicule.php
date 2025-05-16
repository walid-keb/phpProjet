<?php

class ImatriculationRepete extends \Exception {
    public function __construct() {
        parent::__construct("un matricule ne peux pas être dans plusieurs véhicules");
    }
}

class MatriculeNonTrouve extends \Exception {
    public function __construct() {
        parent::__construct("le matricule n'existe pas");
    }
}

class SuppressionVehiculeEnLocation extends \Exception {
    public function __construct() {
        parent::__construct("le vehicule existe dans le carnet de location, il ne peux pas être supprimé");
    }
}
