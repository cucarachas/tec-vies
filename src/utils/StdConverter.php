<?php

namespace Cucarachas\TecVies\utils;

class StdConverter
{

    public static function stdToArray($stdObject) {

        $toJson = json_encode($stdObject);
        $toArray = json_decode($toJson, true);

        return $toArray;
    }
}
