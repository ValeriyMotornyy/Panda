<?php
namespace App\Loaders;

class Language
{
    public static function load($file)
    {
        require "../../language/en/$file";
    }
}
