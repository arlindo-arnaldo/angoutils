<?php

namespace AngoUtils;

session_start();

require './interface/AngoUtilsInterface.php';
use NumberFormatter;
$_SESSION['prov'] = [
    ['name'=> 'Bengo', 'iso' => 'BGO', 'capital'=>'Caxito', 'municipalities' =>['Ambriz', 'Bula Atumba', 'Dande', 'Dembos', 'Nambuangongo', 'Pango Aluquém'] ],

    ['name'=> 'Benguela', 'iso' => 'BGU', 'capital'=>'Benguela', 'municipalities' =>['Balombo', 'Baía Farta', 'Benguela', 'Bocoio', 'Caimbando', 'Catumbela', 'Chongorói', 'Cubal', 'Ganda', 'Lobito'] ],

    ['name'=> 'Bié', 'iso' => 'BIE', 'capital'=>'Cuito', 'municipalities' =>['Andulo', 'Camacupa', 'Catabola', 'Chinguar', 'Chitembo', 'Cuemba', 'Cunhinga', 'Cuíto', 'Nharea'] ],

    ['name'=> 'Cabinda', 'iso' => 'CAB', 'capital'=>'Cabinda', 'municipalities' =>['Belize', 'Buco-Zau', 'Cabinda', 'Cacongo'] ],

    ['name'=> 'Cuando-Cubango', 'iso' => 'CCU', 'capital'=>'Menongue', 'municipalities' =>['Calai', 'Cuangar', 'Cuchi', 'Cuito Cuanavale', 'Dirico', 'Mavinga', 'Menongue', 'Nancova', 'Rivungo'] ],

    ['name'=> 'Cuanza Norte', 'iso' => 'CNO', 'capital'=>'Ndalatando', 'municipalities' =>['Ambaca', 'Banga', 'Bolongongo', 'Cambambe', 'Cazengo', 'Golungo Alto', 'Gonguembo', 'Lucala', 'Ndalatando', 'Quiculungo', 'Samba Caju'] ],

    ['name'=> 'Cuanza Sul', 'iso' => 'CUS', 'capital'=>'Sumbe', 'municipalities' =>['Amboim', 'Cassongue', 'Cela', 'Conda', 'Ebo', 'Libolo',' Mussenfe', 'Porto Amboim','Quibala', 'Seles', 'Sumbe'] ],

    ['name'=> 'Cunene', 'iso' => 'CNN', 'capital'=>'Ondjiva', 'municipalities' =>['Cahama', 'Cuanhama', 'Curoca', 'Cuvelai', 'Namacunde', 'Ombadja', 'Ondjiva'] ],

    ['name'=> 'Huambo', 'iso' => 'HUA', 'capital'=>'Huambo', 'municipalities' =>['Bailundo', 'Cachiungo', 'Caála', 'Ecunha', 'Huambo', 'Londumbali', 'Longonjo', 'Mungo', 'Chicala-Choloanga', 'Chinjenje', 'Ucuma'] ],

    ['name'=> 'Huila', 'iso' => 'HUI', 'capital'=>'Luabango', 'municipalities' =>['Caconda', 'Cacula', 'Caluquembe', 'Chiange', 'Chibia', 'Chicomba', 'Chipindo', 'Cuvango', 'Humpata', 'Jamba', 'Lubango', 'Matala', 'Quilengues', 'Quipungo'] ],

    ['name'=> 'Luanda', 'iso' => 'LUA', 'capital'=>'Luanda', 'municipalities' =>['Belas', 'Cacuaco', 'Cazenga', 'Ícolo e Bengo', 'Luanda', 'Quilamba Quiaxi', 'Talatona', 'Viana'] ],

    ['name'=> 'Lunda Norte', 'iso' => 'LNO', 'capital'=>'Dundo', 'municipalities' =>['Cambulo', 'Capenda-Camulemba', 'Caungula', 'Chitato', 'Cuango', 'Cuílo', 'Lóvua', 'Lubalo', 'Lucapa', 'Xá-Muteba', 'Dundo'] ],

    ['name'=> 'Luanda Sul', 'iso' => 'LSU', 'capital'=>'Saurimo', 'municipalities' =>['Cacolo', 'Dala', 'Muconda', 'Saurimo'] ],

    ['name'=> 'Malanje', 'iso' => 'MAL', 'capital'=>'Malanje', 'municipalities' =>['Cacuso', 'Calandula', 'Cambundi-Catembo', 'Cangandala', 'Caombo', 'Cuaba Nzoji', 'Cunda-Dia-Baze', 'Luquembo', 'Malanje', 'Marimba', 'Massango', 'Mucari', 'Quela', 'Quirima'] ],

    ['name'=> 'Moxico', 'iso' => 'MOX', 'capital'=>'Luena', 'municipalities' =>['Alto Zambeze', 'Bundas', 'Camanongue', 'Léua', 'Luau', 'Luacano', 'Luchazes', 'Cameia', 'Moxico'] ],

    ['name'=> 'Namibe', 'iso' => 'NAM', 'capital'=>'Moçamedes', 'municipalities' =>['Bibala', 'Camucuio', 'Moçâmedes', 'Tômbua', 'Virei'] ],

    ['name'=> 'Uíge', 'iso' => 'UIG', 'capital'=>'Uíge', 'municipalities' =>['Alto Cauale', 'Ambuíla', 'Bembe', 'Buengas', 'Bungo', 'Damba', 'Milunga', 'Mucaba', 'Negage', 'Puri', 'Quimbele', 'Quitexe', 'Sanza Pombo', 'Songo', 'Uíge', 'Zombo'] ],

    ['name'=> 'Zaire', 'iso' => 'ZAI', 'capital'=>'Mbanza Congo', 'municipalities' =>['Cuimba', 'Mbanza Congo', 'Nóqui', 'Nzeto', 'Soio', 'Tomboco'] ],
];;
class AngoUtils implements AngoUtilsInterface
{
    protected  $provinces;

    public function __construct()
    {
       
    }

    public static function formatcurrency(float $value): string
    {
        if ($value) {
            $rules = numfmt_create("pt_AO", NumberFormatter::CURRENCY);
            return numfmt_format_currency($rules, $value, 'AOA');
        }
    }
    public static function formatPhoneNumber(string $number, bool $code = true): string
    {   
        $code_id = "+244 ";
        if (!$code) {
            $code_id = "";
        }

         if(is_numeric($number)) {
            if (strlen($number) == 9) {
                $number = str_split($number);
                $formated_number = [];
                $formated_number[0] = $number[0];
                $formated_number[1] = $number[1];
                $formated_number[2] = $number[2];
                $formated_number[3] = "-";
                $formated_number[4] = $number[3];
                $formated_number[5] = $number[4];
                $formated_number[6] = $number[5];
                $formated_number[7] = "-";
                $formated_number[8] = $number[6];
                $formated_number[9] = $number[7];
                $formated_number[10] = $number[8];
                
                $formated ="";
                foreach ($formated_number as $f) {
                    $formated .= $f;
                }
                return $code_id.$formated;
                
            }
        }else{
            return "Erro";
        }
        
        //return strlen($number);
        
    }
    public static function formatDate(int $timestamp): string
    {
        return "";
    }
    public static function validateIDNumber(string $id): bool
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

    public static function validateNIF(string $id): bool
    {
        return true;
    }
    public static function getAllProvinces(): array
    {
        
        
        return $_SESSION['prov'];
    }
    public static function getProvince(string $iso_code): array
    {
        
        return [];
    }
}
/*
foreach (AngoUtils::getAllProvinces() as $prov) {
    echo '-> '.$prov['name'] ."\n";
    foreach ($prov['municipalities'] as $m) {
        echo "   *  ". $m."\n";
    }
}*/

print_r(AngoUtils::formatPhoneNumber("943148227", true));
