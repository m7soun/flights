<?php

if (!function_exists('removeSpaces')) {
    function removeSpaces($string)
    {
        return str_replace(' ', '', $string);
    }
}
