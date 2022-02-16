<?php

function Load(string $folder){
    foreach (glob(__DIR__."/{$folder}/*.php") as $filename)
    {
        include_once $filename;
    }
}