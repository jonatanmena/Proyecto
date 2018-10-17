<?php
    namespace Config;

    define("ROOT", dirname(__DIR__));
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH",VIEWS_PATH . "css/");

    class Autoload
    {
        public static function start()
        {
            spl_autoload_register(function ($className)
            {
                //echo $className."<br>";                
                $fileName = str_replace("\\", "/", ROOT."/".$className.".php");

                //echo $fileName."<br>";

                require($fileName);
            });
        }
    }


?>
