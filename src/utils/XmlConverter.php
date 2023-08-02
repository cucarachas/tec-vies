<?php

namespace Cucarachas\TecVies\utils;

class XmlConverter
{

    public static function xmlToArray($xmlString) {

        $xml = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);

        if ($xml === false) {
            echo 1;
            return [];
        }

        $toJson = json_encode($xml);
        $toArray = json_decode($toJson, true);

        return $toArray;
    }

    public static function arrayToXml($array){
        return '';
    }
}
