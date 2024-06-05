<?php

interface AngoUtilsInterface{

     public static function formatCurrency(float $value):string;
     public static function formatPhoneNumber(int $number):string;
     public static function formatDate(int $timestamp):string;
     public static function validateID(string $id):string;
     public static function validateNIF(string $id):string;
     public static function getAllProvinces():array;
     public static function getProvinces();
     
}