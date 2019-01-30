<?php

namespace App;

class Translator
{
    public static function toNL($string)
    {
        $translations = [
            'Collect'   => 'Ophalen / Legen',
            'Deliver'   => 'Afleveren',
            'Blue waste container'  => 'Blauw afvalvat (vloeibaar, 10 L, afleverlocatie: 4W40)',
            'Green waste container' => 'Groen afvalvat (vloeibaar, 10 L, afleverlocatie: 4W40)',
            'Red waste container' => 'Rood afvalvat (vloeibaar, 10 L, afleverlocatie: 4W40)',
            'White waste container' => 'Wit afvalvat (vloeibaar, 10 L, afleverlocatie: 4W40)',
            'Black waste container' => 'Zwart afvalvat (verzamelvat, 60 L, afleverlocatie: 4W40)',
            'Solid waste container' => 'Vast afvalvat (60 L, afleverlocatie: 4W40)',
            'Labbutler 4W35 (halogen rich)' => 'Labbutler 4W35 (halogeen rijk)',
            'Labbutler 4W35 (halogen poor)' => 'Labbutler 4W35 (halogeen arm)',
            'Labbutler 4W19 (halogen rich)' => 'Labbutler 4W19 (halogeen rijk)',
            'Labbutler 4W19 (halogen poor)' => 'Labbutler 4W19 (halogeen arm)',
            'Argon 5.0' => 'Argon 5.0 [A 50M], 50 L (Praxair, fixatie compleet)',
            'Helium 5.0' => 'Helium 5.0 [E 71M], 50 L (Praxair, fixatie compleet)',
            'Hydrogen 5.0' => 'Waterstof (H2) 5.0 [H 50M], 50 L (Praxair, fixatie compleet)',
            'Oxygen 5.0' => 'Zuurstof (O2) 5.0 [Z 71M], 50 L (Praxair, fixatie compleet)', 
            'CO2 (with riser)' => 'Koolzuur (CO2) met stijgbuis [K 050M], 50 L (Praxair, fixatie compleet)',
            'SZA container' => 'SZA vaten (ziekenhuisafval) (50 L, afleverlocatie: 4W40)', 
            'Liquid nitrogen tank' => 'Vloeibare stikstof, (dewar 120 L, afleverlocatie: 4W19)',
        ];

        if (! array_key_exists($string, $translations)) {
            return $string;
        }

        return $translations[$string];
    }
}
