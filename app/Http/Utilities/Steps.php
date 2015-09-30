<?php

namespace App\Http\Utilities;

Class Steps
{
    protected static $bigSteps = [
        "DEBUT",
        "DEVIS",
        "USINE",
        "COMMANDE",
        "FINALE",
        "PREFINALE"
    ];
    protected static $detailSteps = [
        "IN",
        "OUT",
        "IN AND OUT",
        "MIDDLE"
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