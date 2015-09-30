<?php

namespace App\Http\Utilities;

Class Steps
{
    protected static $bigSteps = [
        "Debut",
        "Devis",
        "Usine",
        "Commande",
        "Finale",
        "PreFinale"
    ];
    protected static $detailSteps = [
        "in",
        "out",
        "in and out",
        "middle"
    ];
    public static function getBig()
    {
        return (static::$bigSteps);
    }
    public static function getDetails()
    {
        return (static::$detailSteps);
    }
}