<?php

namespace AngoUtils;

session_start();


use InvalidArgumentException;
use NumberFormatter;

$_SESSION['provinces'] = [
    ['name' => 'Bengo', 'iso' => 'BGO', 'capital' => 'Caxito', 'municipalities' => ['Ambriz', 'Bula Atumba', 'Dande', 'Dembos', 'Nambuangongo', 'Pango Aluquém']],

    ['name' => 'Benguela', 'iso' => 'BGU', 'capital' => 'Benguela', 'municipalities' => ['Balombo', 'Baía Farta', 'Benguela', 'Bocoio', 'Caimbando', 'Catumbela', 'Chongorói', 'Cubal', 'Ganda', 'Lobito']],

    ['name' => 'Bié', 'iso' => 'BIE', 'capital' => 'Cuito', 'municipalities' => ['Andulo', 'Camacupa', 'Catabola', 'Chinguar', 'Chitembo', 'Cuemba', 'Cunhinga', 'Cuíto', 'Nharea']],

    ['name' => 'Cabinda', 'iso' => 'CAB', 'capital' => 'Cabinda', 'municipalities' => ['Belize', 'Buco-Zau', 'Cabinda', 'Cacongo']],

    ['name' => 'Cuando-Cubango', 'iso' => 'CCU', 'capital' => 'Menongue', 'municipalities' => ['Calai', 'Cuangar', 'Cuchi', 'Cuito Cuanavale', 'Dirico', 'Mavinga', 'Menongue', 'Nancova', 'Rivungo']],

    ['name' => 'Cuanza Norte', 'iso' => 'CNO', 'capital' => 'Ndalatando', 'municipalities' => ['Ambaca', 'Banga', 'Bolongongo', 'Cambambe', 'Cazengo', 'Golungo Alto', 'Gonguembo', 'Lucala', 'Ndalatando', 'Quiculungo', 'Samba Caju']],

    ['name' => 'Cuanza Sul', 'iso' => 'CUS', 'capital' => 'Sumbe', 'municipalities' => ['Amboim', 'Cassongue', 'Cela', 'Conda', 'Ebo', 'Libolo', ' Mussenfe', 'Porto Amboim', 'Quibala', 'Seles', 'Sumbe']],

    ['name' => 'Cunene', 'iso' => 'CNN', 'capital' => 'Ondjiva', 'municipalities' => ['Cahama', 'Cuanhama', 'Curoca', 'Cuvelai', 'Namacunde', 'Ombadja', 'Ondjiva']],

    ['name' => 'Huambo', 'iso' => 'HUA', 'capital' => 'Huambo', 'municipalities' => ['Bailundo', 'Cachiungo', 'Caála', 'Ecunha', 'Huambo', 'Londumbali', 'Longonjo', 'Mungo', 'Chicala-Choloanga', 'Chinjenje', 'Ucuma']],

    ['name' => 'Huila', 'iso' => 'HUI', 'capital' => 'Luabango', 'municipalities' => ['Caconda', 'Cacula', 'Caluquembe', 'Chiange', 'Chibia', 'Chicomba', 'Chipindo', 'Cuvango', 'Humpata', 'Jamba', 'Lubango', 'Matala', 'Quilengues', 'Quipungo']],

    ['name' => 'Luanda', 'iso' => 'LUA', 'capital' => 'Luanda', 'municipalities' => ['Belas', 'Cacuaco', 'Cazenga', 'Ícolo e Bengo', 'Luanda', 'Quilamba Quiaxi', 'Talatona', 'Viana']],

    ['name' => 'Lunda Norte', 'iso' => 'LNO', 'capital' => 'Dundo', 'municipalities' => ['Cambulo', 'Capenda-Camulemba', 'Caungula', 'Chitato', 'Cuango', 'Cuílo', 'Lóvua', 'Lubalo', 'Lucapa', 'Xá-Muteba', 'Dundo']],

    ['name' => 'Luanda Sul', 'iso' => 'LSU', 'capital' => 'Saurimo', 'municipalities' => ['Cacolo', 'Dala', 'Muconda', 'Saurimo']],

    ['name' => 'Malanje', 'iso' => 'MAL', 'capital' => 'Malanje', 'municipalities' => ['Cacuso', 'Calandula', 'Cambundi-Catembo', 'Cangandala', 'Caombo', 'Cuaba Nzoji', 'Cunda-Dia-Baze', 'Luquembo', 'Malanje', 'Marimba', 'Massango', 'Mucari', 'Quela', 'Quirima']],

    ['name' => 'Moxico', 'iso' => 'MOX', 'capital' => 'Luena', 'municipalities' => ['Alto Zambeze', 'Bundas', 'Camanongue', 'Léua', 'Luau', 'Luacano', 'Luchazes', 'Cameia', 'Moxico']],

    ['name' => 'Namibe', 'iso' => 'NAM', 'capital' => 'Moçamedes', 'municipalities' => ['Bibala', 'Camucuio', 'Moçâmedes', 'Tômbua', 'Virei']],

    ['name' => 'Uíge', 'iso' => 'UIG', 'capital' => 'Uíge', 'municipalities' => ['Alto Cauale', 'Ambuíla', 'Bembe', 'Buengas', 'Bungo', 'Damba', 'Milunga', 'Mucaba', 'Negage', 'Puri', 'Quimbele', 'Quitexe', 'Sanza Pombo', 'Songo', 'Uíge', 'Zombo']],

    ['name' => 'Zaire', 'iso' => 'ZAI', 'capital' => 'Mbanza Congo', 'municipalities' => ['Cuimba', 'Mbanza Congo', 'Nóqui', 'Nzeto', 'Soio', 'Tomboco']],
];

class AngoUtils
{
    protected  $provinces;


    public static function formatcurrency(float $value): string
    {
        if ($value) {
            if (is_numeric($value)) {
                $rules = numfmt_create("pt_AO", NumberFormatter::CURRENCY);
                return numfmt_format_currency($rules, $value, 'AOA');
            }
        }
    }
    public static function formatPhoneNumber(string $number, bool $code = true): string
    {
        $code_id = "+244 ";
        if (!$code) {
            $code_id = "";
        }
        if (is_numeric($number)) {
            if (strlen($number) == 9) {
                $number = str_split($number);
                $formated_number_array = [];
                for ($i = 0; $i <= 10; $i++) {
                    if ($i >= 0 && $i < 3) {
                        $formated_number_array[$i] = $number[$i];
                    }
                    if ($i == 3 || $i == 7) {
                        $formated_number_array[$i] = "-";
                        continue;
                    }
                    if ($i > 3 && $i < 7) {
                        $formated_number_array[$i] = $number[$i - 1];
                        continue;
                    }
                    if ($i > 7 && $i <= 10) {
                        $formated_number_array[$i] = $number[$i - 2];
                        continue;
                    }
                }
                $formated_number_string = "";
                foreach ($formated_number_array as $f) {
                    $formated_number_string .= $f;
                }
                return $code_id . $formated_number_string;
            } else {
                throw new InvalidArgumentException("O número de telefone deve conter 9 Dígitos." . strlen($number) . " Digitos foi passado");
            }
        } else {
            throw new InvalidArgumentException("O número de telefone deve ser uma string numérica");
        }
    }
    public static function formatDate(string $timestamp): string
    {
        if (is_numeric($timestamp)) {
            throw new InvalidArgumentException("A função espera receber uma data no formato de string. Use {-} para separar dia, mês e ano");
            die;
        } else {
            return date('d M. Y', strtotime($timestamp));
        }
    }
    public static function validateIDNumber(string $id): bool
    {
        $abbr = ['LA', 'BO', 'BE', 'BA', 'CC', 'CE', 'HO', 'HA', 'CA', 'CN', 'CS', 'LN', 'LS', 'ME', 'MO', 'UE', 'ZE'];
        if (strlen($id) == 14) {
            $id_number = str_split($id);
            if ($id_number[0] == '0' && $id_number[1] == '0') {
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
        }
        return false;
    }

    public static function validateNIF(string $id): bool
    {
        return true;
    }
    public static function validatePhoneNumber(string $number): bool
    {
        if (is_numeric($number)) {
            if (strlen($number) == 9) {
                $number_array = str_split($number);
                if ($number_array[0] == '9' && in_array($number[1], ['1', '2', '3', '4', '5', '9'])) {
                    return true;
                }
            }
        }
        return  false;
    }
    public static function getAllProvinces(): array
    {
        $provinces = $_SESSION['provinces'];
        return $provinces;
    }
    public static function getProvince(string $iso_code): array
    {
        if (!is_numeric($iso_code)) {
            if (strlen($iso_code) == 3) {
                $iso_code  = strtoupper($iso_code);
                $provinces = $_SESSION['provinces'];
                $iso_codes = array_column($provinces, 'iso');
                $index = array_search($iso_code, $iso_codes);
                if ($iso_code != $provinces[$index]['iso']) {
                    return [];
                }
                return $provinces[$index];
            }
            throw new InvalidArgumentException("O código ISO deve conter 3 caracteres. " . strlen($iso_code) . " caractere foi passado");
        }
        throw new InvalidArgumentException("O código ISO não deve ser um número ou uma string numérica.");
    }
}