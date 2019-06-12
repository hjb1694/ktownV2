<?php 

class Helpers {


    public static function redirect($loc)
    {

        header('Location:'.$loc);
    
    }


    public static function clean($item)
    {

        return trim(htmlspecialchars($item, ENT_QUOTES));

    }

    public static function filterHTML($item)
    {

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($item);


    }


}