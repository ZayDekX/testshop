<?php

function IncludeDir(string $dir)
{
    foreach (glob(__DIR__ . "/{$dir}/*.php") as $file) {
        include_once $file;
    }
}