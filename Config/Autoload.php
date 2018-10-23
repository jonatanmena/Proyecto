<?php
    namespace Config;

    define("ROOT", dirname(__DIR__));
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH",VIEWS_PATH . "css/");

    define("DB_HOST", "localhost");
    define("DB_NAME", "eventos");
    define("DB_USER", "root");
    define("DB_PASS", "123581321");

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
