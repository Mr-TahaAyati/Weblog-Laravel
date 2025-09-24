<?php

use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format)
{

    return Jalalian::forge($date)->format($format);
}
