<?php
namespace AngoUtils;
interface AngoUtilsInterface{

     public static function formatCurrency(float $value):string;
     public static function formatPhoneNumber(string $number, bool $code):string;
     public static function formatDate(int $timestamp):string;
     public static function validateIDNumber(string $id):bool;
     public static function validateNIF(string $id):bool;
     public static function getAllProvinces():array;
     public static function getProvince(string $iso_code):array;
     
}