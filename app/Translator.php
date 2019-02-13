<?php

namespace App;

class Translator
{
    public static function toNL($string)
    {
        $translations = [
            'Collect'   => 'Ophalen / Legen',
            'Deliver'   => 'Afleveren',
            'Blue waste container'  => 'Blauw afvalvat (vloeibaar, 10 L)',
            'Green waste container' => 'Groen afvalvat (vloeibaar, 10 L)',
            'Red waste container' => 'Rood afvalvat (vloeibaar, 10 L)',
            'White waste container' => 'Wit afvalvat (vloeibaar, 10 L)',
            'Black waste container' => 'Zwart afvalvat (verzamelvat, 60 L)',
            'Solid waste container' => 'Vast afvalvat (60 L)',
            'Labbutler (halogen rich, 1)' => 'Labbutler (halogeen rijk)',
            'Labbutler (halogen poor, 1)' => 'Labbutler (halogeen arm)',
            'Labbutler (halogen rich, 2)' => 'Labbutler (halogeen rijk)',
            'Labbutler (halogen poor, 2)' => 'Labbutler (halogeen arm)',
            'Argon 5.0' => 'Argon 5.0 [A 50M], 50 L (leverancier: Praxair)',
            'Helium 5.0' => 'Helium 5.0 [E 71M], 50 L (leverancier: Praxair)',
            'Hydrogen 5.0' => 'Waterstof (H2) 5.0 [H 50M], 50 L (leverancier: Praxair)',
            'Oxygen 5.0' => 'Zuurstof (O2) 5.0 [Z 71M], 50 L (leverancier: Praxair)', 
            'CO2 (with riser)' => 'Koolzuur (CO2) met stijgbuis [K 050M], 50 L (leverancier: Praxair)',
            'SZA container' => 'SZA vaten (ziekenhuisafval) (50 L)', 
            'Glass bin' => 'Glasbak (container, 240 L)',
            'Paper bin' => 'Papierbak (container, 240 L)',
            'Plastic bin'  => 'Kunststof (container, 240 L)',
            'Waste bin'  => 'Restafval (container, 240 L)',
            'Liquid nitrogen tank' => 'Vloeibare stikstof (dewar, 120 L)',
        ];

        if (! array_key_exists($string, $translations)) {
            return $string;
        }

        return $translations[$string];
    }
}
