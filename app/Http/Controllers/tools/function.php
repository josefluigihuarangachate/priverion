<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function restarDosHoras2($hour, $second) {
    $restarHour = strtotime('-' . intval($second) . ' second', strtotime($hour));
    $newHour = date('H:i:s', $restarHour);
    return $newHour;
}

function restarDosHoras($h1, $h2) {
    $horaInicio = new DateTime($h1);
    $horaTermino = new DateTime($h2);

    $interval = $horaInicio->diff($horaTermino);
    return $interval->format('%H:%I:%S');
}

// SIRVE PARA CONVERTIR DE SEGUNDOS A HORA (HH:MM:SS)
// EJM : $segundos = 129600
// SERIA: 36:00:00
function convertSecondToHour($segundos) {
    // Ejm : https://aprenderaprogramar.com/foros/index.php?topic=5958.0#:~:text=PHP%20convertir%20dato%20segundos%20a%20horas%2C%20minutos%20y%20segundos%20usando%20funciones%20floor,-%C2%AB%20en%3A%2011%20de&text=%24segundos%20%3D%20%24_POST%5B',horas%20*%203600))%20%2F%2060)%3B
    if (!empty($segundos)) {
        $horas = floor($segundos / 3600);
        $minutos = floor(($segundos - ($horas * 3600)) / 60);
        $segundos = $segundos - ($horas * 3600) - ($minutos * 60);

        if ($horas <= 9) {
            $horas = "0" . $horas;
        }
        if ($minutos <= 9) {
            $minutos = "0" . $minutos;
        }
        if ($segundos <= 9) {
            $segundos = "0" . $segundos;
        }
        return $horas . ':' . $minutos . ":" . $segundos;
    } else {
        return "00:00:00";
        //return "00:00";
    }
}

// SIRVE PARA CONVERTIR DE HORA A SEGUNDOS (HH:MM:SS)
// EJM : $hour = 00:00:02
// SERIA: 2
function convertHourToSecond($hour) {
    if ($hour != '00:00:00') {
        return strtotime($hour) - strtotime('00:00:00');
    } else {
        return 0;
    }
}

function objectToArray(&$object) {
    return @json_decode(json_encode($object), true);
}

function imprimir($data) {
    echo "<pre>", print_r($data), "</pre>";
}

function getUrl() {

    $http = "http://";
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $http = "https://";
    }

    $host = $_SERVER["HTTP_HOST"];
    $url = $_SERVER["REQUEST_URI"];
    //return $http . $host . $url;
    return $http . $host . "/";
}

function array_value_recursive($key, array $arr) {
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val) {
        if ($k == $key)
            array_push($val, $v);
    });
    return $val;
}

// SIRVE PARA ELIMINAR CARPETA CON SUS ARCHIVOS
function delete_files($target) {
    if (is_dir(@$target)) {
        @$files = glob(@$target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

        foreach (@$files as $file) {
            @delete_files(@$file);
        }

        @rmdir(@$target);
    } elseif (@is_file(@$target)) {
        @unlink(@$target);
    }
}

function find_word_in_string($string, $find) {
    if (strpos($string, $find) !== false) {
        return true;
    } else {
        return false;
    }
}

// SIRVE PARA LA PRIMERA LETRA DE UNA PALABRA
// EJM: JUAN MANUEL
// RETORNA JUAN
function primerapalabra($palabra) {
    $sep = explode(" ", @trim(@$palabra));
    return @$sep[0];
}

function inputs($input) {
    return @htmlspecialchars(@trim($input));
}

function empty_($data){
    if($data){
        return $data;
    }else{
        return null;
    }
}