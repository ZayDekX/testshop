<?php

function IncludeDir(string $dir)
{
    foreach (glob(__DIR__ . "/{$dir}/*.php") as $file) {
        IncludeFile($file);
    }
}

function IncludeFile(string $file){
    include_once $file;
}

function IncludeClass(string $class){
    include_once find(__DIR__, $class."/\.php/")[0];
}


function find($folder, $regPattern) {
    $dir = new RecursiveDirectoryIterator($folder);
    $ite = new RecursiveIteratorIterator($dir);
    $files = new RegexIterator($ite, $regPattern, RegexIterator::GET_MATCH);
    $fileList = array();
    $i = 0;
    foreach($files as $file) {
        if(!$file){
            continue;
        }

        $fileList[$i] = $file;
        $i++;
    }
    return $fileList;
}