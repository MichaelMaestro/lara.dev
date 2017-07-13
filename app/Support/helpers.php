<?php


function custom_trim($str)
{
	$charCodes = array_map("chr", range(128, 255));
    $str = str_replace($charCodes, "", $str);

    return $str;
}