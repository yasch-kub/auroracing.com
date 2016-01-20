<?php

class Validator
{
    public static function clear($value)
    {
        return htmlspecialchars(trim(strip_tags($value)));
    }
}