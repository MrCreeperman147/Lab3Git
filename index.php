<?php 
    require_once 'autoload.php';

    const DEFAULT_CONTROLLER = "IndexController";
    const DEFAULT_ACTION = "index";

    function applyAction($controller, $action) : void
    {
        #Si la methode existe
        if(method_exists($controller, $action))
        {
            #Verifie que la clé des données transféré n'est pas egal a 'controller' et 'action'
            $params = array();
            foreach($_GET as $key => $value)
            {
                if ($key != 'controller' && $key != 'action') 
                {
                    $params[$key] = $value;
                }
            }

            foreach ($_POST as $key => $value) 
            {
                if ($key != 'controller' && $key != 'action') 
                {
                    $params[$key] = $value;
                }
            }
            $controller::$action($params);
        }
        else #Sinon l'action par default prend la releve
        {
            $controller = DEFAULT_CONTROLLER;
            $action = DEFAULT_ACTION;

            $controller::$action(array());
        }
    }

    $currentController = DEFAULT_CONTROLLER;
    $currentAction = DEFAULT_ACTION;

    if (isset($_GET['controller'])) 
    {
        $currentController = $_GET['controller'];
        if (isset($_GET['action'])) 
        {
            $currentAction = $_GET['action'];
        }
    }   
    else if (isset($_POST['controller'])) 
    {
        $currentController = $_POST['controller'];
        if (isset($_POST['action'])) {
            $currentAction = $_POST['action'];
        }
    }

    if (isset($_COOKIE['codename']) && !UserManager::$logged) {
        UserManager::$logged = true;
        UserManager::$codename = $_COOKIE['codename'];
    }



?>

<html lang = "fr">
    <head>
        <?php require_once './view/template/Head.php'; ?>
        <!-- css supplementaire -->
    </head>
    <body>
        <main>
            <?php
                applyAction($currentController, $currentAction); 
                var_dump($_COOKIE);
            ?>

        </main>
        <footer>
            <?php require_once './view/template/Footer.html'; ?>
        </footer> 
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    </body>
</html>