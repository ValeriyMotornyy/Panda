<?php
namespace App\Helpers;

/**
* @abstract Json Helper
*/
class JsonHelper
{
    public function __construct() { }

    /**
    * Converts Json to an array
    */
    public static function toArray($data)
    {
        $array = [];
        foreach ($data as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }
}
