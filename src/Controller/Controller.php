<?php

    //Classe mere de controller
    class Controller
    {
        //Permet de simuler les "Routes" du framework symfony
        public static function render($route, $params) : void
        {
            extract($params);
            require($route);
        }
    }

?>