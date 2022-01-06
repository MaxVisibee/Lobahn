<?php

namespace App\Helpers;

use Request;

class MiscHelper
{

    public static function getNumPositions()
    {
        $array = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30'];
        return $array;
    }

    public static function getNumEmployees()
    {
        // $array = ['1-10' => '1-10', '11-50' => '11-50', '51-100' => '51-100', '101-200' => '101-200', '201-300' => '201-300', '301-600' => '301-600', '601-1000' => '601-1000', '1001-1500' => '1001-1500', '1501-2000' => '1501-2000', '2001-2500' => '2001-2500', '2501-3000' => '2501-3000', '3000+' => '3000+'];
        $array = ['0' => '0','1-5' => '1-5', '6-20' => '6-20', '21-100' => '21-100', '101-500' => '101-500', 'Over 500' => 'Over 500'];
        return $array;
    }

    public static function getGender()
    {
        $array = ['Male'=>'Male','Female'=>'Female'];
        return $array;
    }
    
    public static function getMaritalStatus()
    {
        $array = ['Divorced'=>'Divorced','Married'=>'Married','Separated'=>'Separated','Single'=>'Single','Widow/er'=>'Widow/er'];
        return $array;
    }

    public static function getLanguageLevel()
    {
        $array = ['Basic'=>'Basic','Intermediate'=>'Intermediate','Advance'=>'Advance'];
        return $array;
    }

}
