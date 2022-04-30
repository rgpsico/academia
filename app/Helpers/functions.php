<?php
function formatDateAndTime($value, $format = 'd/m/Y')
{
    // Utiliza a classe de Carbon para converter ao formato de data ou hora desejado
    return Carbon\Carbon::parse($value)->format($format);
}

function CelAjuste($cel)
{
    $cel = trim($cel);
    $cel = str_replace("-", "", $cel);
    $cel = str_replace(")", "", $cel);
    $cel = str_replace("(", "", $cel);
    return  $cel;
}



if (!function_exists('cdn')) {
    function cdn($asset)
    {
        return asset($asset);
    }
}
