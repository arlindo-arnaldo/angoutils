<?php

namespace ArlindoArnaldo\AngoUtils;

use NumberFormatter;

class AngoUtils
{

    public static function currency(float $value): string
    {
        if ($value) {
            $rules = numfmt_create("pt_AO", NumberFormatter::CURRENCY);
            return numfmt_format_currency($rules, $value, 'AOA');
        }
    }

    public static function validateIDNumber(string $id)
    {
        $abbr = ['LA', 'LN', 'MX', 'HB', 'UG'];

        if (strlen($id) == 14) {
            $id_number = str_split($id);
            for ($i = 0; $i <= 8; $i++) {
                if (is_numeric($id_number[$i])) {
                    continue;
                } else {
                    return false;
                }
            }
            if (is_string($id_number[9]) && is_string($id_number[10])) {
                $prov = strtoupper($id_number[9]) . strtoupper($id_number[10]);
            }
            for ($i = 11; $i <= 13; $i++) {
                if (is_numeric($id_number[$i])) {
                    continue;
                } else {
                    return false;
                }
            }
            if (in_array($prov, $abbr)) {
                return true;
            }
        }
        return false;
    }

    public static function validateNIF(string $id)
    {

        return strlen($id);
    }
}

var_dump(AngoUtils::validateIDNumber("088202377la063"));
