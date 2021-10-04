<?php 

namespace App\Helper;

class Helper 
{
    public static function convert_date_format($date)
    {
        $rawdate = $date;
        $array = explode('/', $rawdate);
        $format = $array[2].'-'.$array[1].'-'.$array[0];
        return $format;
    }
}

?>