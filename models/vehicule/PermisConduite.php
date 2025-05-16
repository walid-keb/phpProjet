<?php

namespace models\vehicule;

class PermisConduite {
    // Type A pour les motos
    public const TYPE_A = 'A';
    // Type B pour les voitures
    public const TYPE_B = 'B';
    // Type C pour les camions (implique avoir le B)
    public const TYPE_C = 'C';
}
